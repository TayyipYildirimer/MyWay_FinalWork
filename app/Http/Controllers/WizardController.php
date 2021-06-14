<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class WizardController extends Controller
{
    public function colorExtract($id){
        $numColors= 4;
        $granularity = 5;
        $user = User::where('id', $id)->first();
        $imageURL = $user->profileimg;

        /*****
        //TEST 2
        $granularity = max(1, abs((int)$granularity)); 
        $colors = array(); 
        $size = @getimagesize($imageURL); 
        if($size === false) 
        { 
           user_error("Unable to get image size data"); 
           return false; 
        } 
        $img = imagecreatefromstring(file_get_contents($imageURL));
        // Andres mentioned in the comments the above line only loads jpegs, 
        // and suggests that to load any file type you can use this:
        // $img = @imagecreatefromstring(file_get_contents($imageFile)); 
     
        if(!$img) 
        { 
           user_error("Unable to open image file"); 
           return false; 
        } 
        for($x = 0; $x < $size[0]; $x += $granularity) 
        { 
           for($y = 0; $y < $size[1]; $y += $granularity) 
           { 
              $thisColor = imagecolorat($img, $x, $y); 
              $rgb = imagecolorsforindex($img, $thisColor); 
              $red = round(round(($rgb['red'] / 0x33)) * 0x33); 
              $green = round(round(($rgb['green'] / 0x33)) * 0x33); 
              $blue = round(round(($rgb['blue'] / 0x33)) * 0x33); 
              $thisRGB = sprintf('%02X%02X%02X', $red, $green, $blue); 
              if(array_key_exists($thisRGB, $colors)) 
              { 
                 $colors[$thisRGB]++; 
              } 
              else 
              { 
                 $colors[$thisRGB] = 1; 
              } 
           } 
        } 
        arsort($colors); 
        array_slice(array_keys($colors), 0, $numColors); 

        *********************https://stackoverflow.com/questions/10290259/detect-main-colors-in-an-image-with-php**************
        $palletSize=[4,4];
        $user = User::where('id', $id)->first();
        $imageURL = $user->profileimg;
        // TEST
            if(!$imageURL) return view('home');

            $img = imagecreatefromstring(file_get_contents($imageURL));

            $imgSizes= getimagesize($imageURL);

            $resizedImg= imagecreatetruecolor($palletSize[0],$palletSize[1]);

            imagecopyresized($resizedImg, $img , 0, 0 , 0, 0, $palletSize[0], $palletSize[1], $imgSizes[0], $imgSizes[1]);

            imagedestroy($img);
            $colors=[];

            for($i=0;$i<$palletSize[1];$i++)
                for($j=0;$j<$palletSize[0];$j++)
                    $colors[]=dechex(imagecolorat($resizedImg,$j,$i));

            imagedestroy($resizedImg);

            $colors= array_filter($colors);
            $colors= array_unique($colors);
        // END TEST******/
        
        $jpeg_image = imagecreatefromstring(file_get_contents($imageURL));

        $palette = Palette::fromGD($jpeg_image);
        
        // Create an instance of the extractor
        $extractor = new ColorExtractor($palette);

        // Extract only the 4 representative colors in the image
        $colors = $extractor->extract(4);
        $colors = array_filter($colors);
        $colorsLength = count($colors);

        if($colorsLength < 4){
            $colors = $extractor->extract(5);
            $colors = array_filter($colors);
        }
        if($colorsLength == 5){
            $colors = $extractor->extract(5);
            $colors = array_pop($colors);
        }
        
        
        // An array to store the hexadecimal colors
        $hexColors = [];

        // Loop through the 5 representative colors (in integer format)
        foreach($colors as $color) {

            // Convert the number to its hex representation and add to the $hexColors array
            array_push($hexColors , Color::fromIntToHex($color));
        }
        $user->imgColors = $hexColors;
        $user->update();
        $str_hexColors = json_encode($hexColors);
        return view('wizard.second', compact('str_hexColors', 'colorsLength'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = \App\Models\colors::all();
        return view('wizard.create',['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        /**$request->validate([
            'title' => 'required|max:60',
            'age' => 'required|digits_between:1,2',
            'shortdesc' => 'required|max:255'
        ]);
        
        $wizard = new Wizard();
        $wizard->age = $request['age'];
        $wizard->title = $request['title'];
        $wizard->shortdescription = $request['shortdesc'];
        $wizard->description = $request['desc'];
        $wizard->category = $request['category'];
        $wizard->specialization = $request['specialization'];
        $wizard->emotions = $request['emotions'];
        $wizard->save();**/
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
