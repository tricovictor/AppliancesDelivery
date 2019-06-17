<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Quality;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Symfony\Component\DomCrawler\Crawler;

class ScrappingController extends Controller
{
    public function reading(Client $client)
    {
    	$this->resetBD();
    	$total=1;
    	for ($i=1; $i<=$total; ++$i) {
    		$pageUrl = "https://www.appliancesdelivered.ie/search/small-appliances?sort=price_desc&page=" . $i;
    		$crawler = $client->request('GET', $pageUrl );
    		if ($i==1) {
    			$endPage = $crawler->filterXpath("//div[@class='col-xs-12 col-md-6 products-count']")->first()->text();
    			$total = ceil(intval(preg_replace('/[^0-9]+/', '', $endPage), 10)/20);
    		}
    		$this->readingPage($crawler);
    	}

    }

    public function readingPage(Crawler $crawler)
    {
    	$crawler->filterXpath("//div[@class='search-results-product row']")->each(function(Crawler $producto){


    		$extractCode = $producto->filterXpath("//div[@class='product-image col-xs-4 col-sm-4']")->filterXpath("//a")->first()->attr('href');
    		$code = intval(preg_replace('/[^0-9]+/', '', substr($extractCode, -5)), 10);
    		if (Article::where('code', $code)->first() == null)
	    	{
	    		$article = new Article();
	    	} else
	    	{
	    		$article = Article::where('code', $code)->first();
	    	}
	    	$article->code = $code;
	    	$article->image = $producto->filterXpath("//img[@class='lazy-img img-responsive']")->attr('data-src');
	    	$article->description = $producto->filterXpath("//h4")->first()->text();
	    	$price = $producto->filterXpath("//h3")->first()->text();
	    	$article->price = intval(preg_replace('/[^0-9]+/', '', $price), 10)/100;
	    	$article->categories_id = 1;
	    	$article->save();

	    	$elements = $producto->filterXpath('//li')->extract(array('_text'));
	    	foreach ($elements as $element) {
	    		$item = strtolower(strstr($element, ':', true));
	    		$description = substr(strstr($element, ':'),1);
	    		$quality = new Quality();
	    		$quality->item = $item;
	    		$quality->description = $description;
	    		$quality->articles_id = Article::all()->last()->id;
	    		$quality->save();
	    	}
    	});    	
    }

	public function resetBD()
	{
		Quality::query()->delete();
	}    
}
