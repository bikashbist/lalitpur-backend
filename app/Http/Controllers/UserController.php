<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\AboutUsGroup;
use App\Models\MenuProduct;
use App\Models\Product;
use App\Models\ContactInfo;
use App\Models\Gallery;
use App\Models\Banner;
use App\Models\Advertisement;
use App\Models\Team;
use App\Models\MenuCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use App\Models\PageBanner;
use App\Models\Certificate;
use App\Models\CoreValue;
use App\Models\TopUniversity;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentReceived;
use App\Mail\AppointmentConfirmation;
use App\Models\Document;
use App\Models\Location;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Blog;
use App\Models\TestPreparation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\OfficeIntroduction;
use App\Models\OfficeChief;
use App\Models\TeamMember;
use App\Models\ServiceProcess;
use App\Models\Rule;
use App\Models\OrganizationalStructure;
use App\Models\CitizenCharter;
use App\Models\CitizenService;
use App\Models\OtherService;
use App\Models\PublicationProcess;
use App\Models\ServiceFlow;
use App\Models\PressRelease;
use App\Models\TeamLalitpurMember;

class UserController extends Controller
{
    public function index() {
        $banners = Banner::all();
        
        $regularMembers = TeamLalitpurMember::where('is_spokesperson', false)
                            ->orderBy('order')
                            ->get();
        
        $spokespersons = TeamLalitpurMember::where('is_spokesperson', true)
                                ->orderBy('order')
                                ->get();

        $blogs = Blog::all();
        
        // Get oldest video
        $oldestVideo = Gallery::where('category', 'video')
                            ->orderBy('created_at', 'asc') // Oldest first
                            ->first();
                             // Get latest 3 videos
        $latestVideos = Gallery::where('category', 'video')
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
        $galleries = Gallery::where('category', 'photo')
                    ->orderBy('created_at', 'asc') // oldest first
                    ->take(3)
                    ->get();
                    
            $documents = Document::latest()->take(4)->get();
            $highlightBlogs = Blog::where('is_active', 1)->latest()->take(5)->get();



    
        
        return view('users.index', compact('regularMembers', 'spokespersons', 'banners', 'blogs', 'oldestVideo','latestVideos','galleries','documents','highlightBlogs'));
    }


    public function aboutUs()
    {
        return view('users.pages.about-us');
    }

    public function officeIntroduction()
    {
        
        $introduction = OfficeIntroduction::where('status', true)->first();

        return view('users.pages.office-introduction', compact('introduction'));
    }

    public function officialsAndStaff()
    {
        return view('users.pages.officials-and-staff');
    }

  public function officeHead()
    {
        $chief = OfficeChief::latest()
            ->where('status', true)
            ->first(); // Change get() to first()
        
        return view('users.pages.office-head', compact('chief'));
    }

    public function organizationalStructure()
    {
        $structure = OrganizationalStructure::active()->first();
        return view('users.pages.organizational-structure', compact('structure'));
    }

    public function ourTeam()
    {
         $members = TeamMember::active()->ordered()->get();
        return view('users.pages.our-team', compact('members'));
       
    }

    public function serviceReceiptMethod()
    {
         $process = ServiceProcess::active()->first();
        return view('users.pages.service-receipt-method', compact('process'));
       
    }

    public function regulations()
    {
         $rules = Rule::active()->ordered()->get();
        return view('users.pages.regulations', compact('rules'));
    }

    public function services()
    {
        return view('users.pages.services.index');
    }

    public function serviceFlow()
    {

          $services = ServiceFlow::where('is_active', true)->orderBy('order')->get();
        $firstService = $services->first();
      
        
        return view('users.pages.services.service-flow', compact('services', 'firstService'));
       
    }

    public function citizenCharter()
    {
        
        $charter = CitizenCharter::active()->first();
        return view('users.pages.services.citizen-charter', compact('charter'));
    }

    public function civilService()
    {
        $services = CitizenService::active()->ordered()->get();
        return view('users.pages.services.civil-service', compact('services'));
    }

    public function servicesAndFacilities()
    {
        return view('users.pages.services.services-and-facilities');
    }

    public function publicationPermission()
    {
        $process = PublicationProcess::active()->ordered()->first();
        return view('users.pages.services.publication-permission', compact('process'));

    }

    public function otherServices()
    {
         $services = OtherService::active()->ordered()->get();
        return view('users.pages.services.other-services', compact('services'));
    }

    public function publications()
    {
        return view('users.pages.publications.index');
    }

    public function news()
    {
         $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return view('users.pages.publications.news', compact('blogs'));
    }
   

    public function showNews(News $blogs)
    {
        return view('users.pages.publications.news-detail', compact('news'));
    }

    public function informationAndPressReleases()
    {

        $blogs = Blog::where('category', 'press-release')->latest()->get();
    $releases = PressRelease::latest()->get();
  

      
        return view('users.pages.publications.information-and-press-releases', compact('releases','blogs', 'releases'));
        
    }

    public function statistics()
    {
        return view('users.pages.publications.statistics');
    }

    public function annualReport()
    {
        return view('users.pages.publications.annual-report');
    }

    public function otherPublications()
    {
        return view('users.pages.publications.other-publications');
    }

    public function resources()
    {
        return view('users.pages.resources.index');
    }

    public function laws()
    {
        return view('users.pages.resources.laws');
    }

    public function regulationsResources()
    {
        return view('users.pages.resources.regulations');
    }

    public function guidelines()
    {
        return view('users.pages.resources.guidelines');
    }

    public function process()
    {
        return view('users.pages.resources.process');
    }

    public function forms()
    {
        return view('users.pages.resources.forms');
    }

    public function gallery()
    {
        return view('users.pages.gallery.index');
    }

    public function photoGallery()
    {
          $galleries = Gallery::where('category', 'photo')->get();
 
        return view('users.pages.gallery.photo',compact('galleries'));
    }

    public function videoGallery()
    {
         $videos = Gallery::where('category', 'video')->get();
  
        return view('users.pages.gallery.video', compact('videos'));
    }

    public function mediaCenter()
    {
        return view('users.pages.media-center.index');
    }

    public function pressReleases()
    {
        return view('users.pages.media-center.press-releases');
    }

    public function newsClippings()
    {
        return view('users.pages.media-center.news-clippings');
    }

    public function mediaCoverage()
    {
        return view('users.pages.media-center.media-coverage');
    }

    public function downloads()
    {
        return view('users.pages.downloads.index');
    }

    public function downloadForms()
    {
        return view('users.pages.downloads.forms');
    }

    public function downloadReports()
    {
        return view('users.pages.downloads.reports');
    }

    public function downloadPublications()
    {
        return view('users.pages.downloads.publications');
    }

    public function otherFiles()
    {
        return view('users.pages.downloads.other-files');
    }

    public function contact()
    {
        return view('users.pages.contact');
    }

public function submitAppointment(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'date' => 'required|date',
        'time' => 'required',
        'message' => 'nullable|string'
    ]);

    // Send email to you (admin)
    Mail::to('bikashbist1414@gmail.com')->send(new AppointmentReceived($validated));

    // Send confirmation email to user
    Mail::to($validated['email'])->send(new AppointmentConfirmation($validated));

    return back()->with('success', 'Appointment submitted! We’ll contact you soon.');
}

   // app/Http/Controllers/BlogController.php
public function newsDetails($slug)
{
    $blog = Blog::where('slug', $slug)->firstOrFail();
     $banners = Banner::all();
    // Get related blogs (optional)
    $relatedBlogs = Blog::where('id', '!=', $blog->id)
        ->latest()
        ->take(3)
        ->get();
    
    return view('users.new-details', compact('blog', 'relatedBlogs','banners'));
}
    
}
