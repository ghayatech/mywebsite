<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\HeroSection;
use App\Models\Menu;
use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\StatisticSection;
use App\Models\TeamMember;
use App\Models\TeamSection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        echo ('testssششasaششaسس');
        exit;
        $blogPosts = Cache::get('blog_posts');
        if (!$blogPosts) {
            try {
                $response = Http::timeout(5)->get('https://blog.ghayatech.com/wp-json/wp/v2/posts?_embed&per_page=4');

                if ($response->successful()) {
                    $posts = $response->json();
                    $formattedPosts = [];

                    foreach ($posts as $post) {
                        $formattedPosts[] = [
                            'title' => $post['title']['rendered'],
                            'description' => strip_tags($post['excerpt']['rendered']),
                            'link' => $post['link'],
                            'image' => $post['_embedded']['wp:featuredmedia'][0]['source_url'] ?? asset('assets/images/application.jpg'),
                        ];
                    }

                    // فقط لو تم جلب الداتا بنجاح نخزنهم بالكاش
                    Cache::put('blog_posts', $formattedPosts, now()->addMinutes(30));

                    $blogPosts = $formattedPosts;
                } else {
                    $blogPosts = []; // الموقع راجع خطأ HTTP
                }
            } catch (\Exception $e) {
                $blogPosts = []; // أي مشكلة في الاتصال أو الوقت
            }
        }

        // dd($blogPosts);

        $locale = app()->getLocale();
        $hero = HeroSection::where('locale', $locale)->first();
        $statisticsSection = StatisticSection::with(['statistics' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->where('locale', $locale)->first();

        $services = Service::with('translations')->get();



        $about = AboutSection::with('translations')->first();
        $aboutTranslation = $about?->translations->firstWhere('locale', app()->getLocale());

        $teamSection = TeamSection::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $teamMembers = TeamMember::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->get();


        $menus = Menu::with('translations')->get();

        $passing = [
            'hero',
            'statisticsSection',
            'services',
            'about',
            'aboutTranslation',
            'teamSection',
            'teamMembers',
            'blogPosts',
            'menus',
        ];
        return view('website.index', compact($passing));
    }
}
