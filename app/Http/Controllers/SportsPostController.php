<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Team;
use App\Category;
use App\Video;
use Illuminate\Support\Facades\Storage;



class SportsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */






     public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','showTeam','showCat','updateCount']]);
    }


    public function index()
    {
        $slide=Post::orderBy('created_at','desc')->take(5)->get();
        $posts=Post::orderBy('created_at','desc')->paginate(11);
        $popular=Post::orderBy('visit_count','desc')->take(6)->get();
$videos=Video::orderBy('created_at','desc')->take(3)->get();
        return view('welcome')->with(['posts'=>$posts,'slide'=>$slide,
        'videos'=>$videos, 'popular'=>$popular
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVideo()
    {



    $teams=Team::pluck('team','id');
        return view('pages.video')->with('teams',$teams);

    }




    public function create()
    {


$category=Category::pluck('type','id');
    $teams=Team::pluck('team','id');
        return view('pages.create')->with(['teams'=>$teams,
        'type'=>$category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeVideo(Request $request)
    {
        $this->validate($request,[
'title'=>'required',
'url'=>'required',
'teams'=>'required'

        ]);


$videos= new Video;
 $videos->title=$request->input('title');
 $videos->url=$request->input('url');
 $videos->team_id=$request->input('teams');
 $videos->user_id=auth()->user()->id;
$videos->save();

return redirect('/createVideo')->with('success','The Post was Published Successfully');

    }




    public function store(Request $request)
    {
        $this->validate($request,[
'title'=>'required',
'post'=>'required',
'type'=>'required',
'teams'=>'required',
'file'=>'image|nullable|max:6000|required:required|mimes:jpeg,bmp,jpg,png',
        ]);
if($request->hasFile('file')){

    $file = $request->file('file');
           $name = time() . $file->getClientOriginalName();
           $filePath = 'images/' . $name;
           Storage::disk('s3')->put($filePath, file_get_contents($file));
          
}

$posts= new Post;
 $posts->title=$request->input('title');
 $posts->body=$request->input('post');
 $posts->team_id=$request->input('teams');
 $posts->category_id=$request->input('type');
 $posts->user_id=auth()->user()->id;
 $posts->image=$filePath;
$posts->save();

return redirect('/post/create')->with('success','The Post was Published Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $post=Post::find($id);
        $side=Post::where('category_id','=',3)->orderBy('created_at','desc')
        ->paginate(10);
        $post->increment('visit_count');


        return view('pages.show')->with(['post'=>$post, 'side'=>$side]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function showTeam($id)
    {
        $team=Team::findorfail($id);
        $posts=Post::where('team_id','=',$id)->orderBy('created_at','desc')
        ->paginate(10);
$slide=Post::where('team_id','=',$id)->orderBy('created_at','desc')
->paginate(10);
     return view('pages.team')->with(['team'=>$team,
     'posts'=>$posts, 'slide'=>$slide
     ]);
//$post->team->get();
//return $post->body;
        //return view('pages.team')->with('post',$post);
    }

    public function showCat($id)
    {
     $cat=Category::findorfail($id);
     $posts=Post::where('category_id','=',$id)->orderBy('created_at','desc')
     ->paginate(10);
$slide=Post::where('category_id','=',$id)->orderBy('created_at','desc')
->paginate(10);
  return view('pages.cat')->with(['cat'=>$cat,
  'posts'=>$posts, 'slide'=>$slide
  ]);

   // return view('pages.cat')->with('post',$post);

    }
    public function edit($id)
    {
        $posts=Post::find($id);
        $category=Category::pluck('type','id');
        $teams=Team::pluck('team','id');
            return view('pages.edit')->with(['teams'=>$teams,
            'type'=>$category,
            'posts'=>$posts
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function updateCount(Request $request, $id)
    {
        $posts=Post::find($id);

        $viewCount=$request->visitCount;
$posts->visit_count=$viewCount;
$posts->save();
return redirect()->route('post.show',['id'=>$id]);


    }

    public function update(Request $request, $id)
    {


        $this->validate($request,[
            'title'=>'required',
            'post'=>'required',
            'type'=>'required',
            'teams'=>'required',
            'file'=>'image|nullable|max:3000|',
                    ]);
                    $posts=Post::find($id);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time() . $file->getClientOriginalName();
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
          

        }


         $posts->title=$request->input('title');
         $posts->body=$request->input('post');
         $posts->team_id=$request->input('teams');
         $posts->category_id=$request->input('type');
         $posts->user_id=auth()->user()->id;
         $posts->image=$filePath;
        $posts->save();
        return redirect('/post/create')->with('success','The Post was
         Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::findorfail($id);
        $posts->delete();
        return view('/home')->with('success', 'this post that was not necessary was deleted succesfully');
    }
}
