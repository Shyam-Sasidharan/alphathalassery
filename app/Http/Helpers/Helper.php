<?php
/**
 * Created by PhpStorm.
 * User: vineeth
 * Date: 11/12/17
 * Time: 5:50 PM
 */

if (!function_exists('upload')) {

    /**
     * @param $file
     * @param string $path
     * @return string
     */
    function upload($file, $path = "uploads")
    {
        if ($file->isValid()) {
            if (!is_dir(public_path($path))) {
                @mkdir(public_path($path), 0777, true);
            }
            $ext = $file->getClientOriginalExtension();
            $filename = md5(uniqid().time()) . '.' . $ext;
            $file->move(public_path($path), $filename);
            if (strrchr($path, '/') !== '/') {
                $path .= '/';
            }

            return file_exists(public_path($path . $filename)) ? $path . $filename : '';
        }

        return "";
    }
}


if (!function_exists('sms')) {

    /**
     * Send SMS
     *
     * @param  string $numbers
     * @param  string $content
     * @return boolean
     */
    function sms($numbers, $content): bool
    {
        /** Add msg91 details here */
        $API_KEY = '85040A633DsuWaf586a945d';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=DOCAPP&route=4&mobiles=$numbers&authkey=$API_KEY&country=91&message=" . urlencode($content),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        }

        return true;
    }
}

if (!function_exists('getOpeningBalance')) {

    /**
     * @param null $date
     * @return float
     */
    function getOpeningBalance($date = null) : float
    {

        if (is_null($date)) {
            $date = date('Y-m-d');
            if (($record = \App\Models\Account::latest()->first()) != NULL){
                $date = $record->day;
            }
        }

        $day = new DateTime($date);

        $prevDay = $day->sub(new DateInterval('P1D'))->format('Y-m-d');

        /** Get Previous day's Closing Balance */
        if (($account = \App\Models\Account::whereDate('day', '=', $prevDay)->first()) != null) {
            return $account->closing_balance;
        }
        return 0.00;

    }
}

if(!function_exists('getYoutubeVideoId')){
    function getYoutubeVideoId($video_id){

        // Did we get a URL?
        if ( FALSE !== filter_var( $video_id, FILTER_VALIDATE_URL ) )
        {

            // http://www.youtube.com/v/abcxyz123
            if ( FALSE !== strpos( $video_id, '/v/' ) )
            {
                list( , $video_id ) = explode( '/v/', $video_id );
            }
            // http://www.youtube.com/embed/abcxyz123
            else if( FALSE !== strpos( $video_id, '/embed/' )){
                list( , $video_id ) = explode( '/embed/', $video_id );
            }
            // https://youtu.be/Q8d7LjYrN38
            else if(FALSE !== strpos($video_id, 'youtu.be')){
                $exploded = explode('/', $video_id);
                $video_id = end($exploded);
            }
            // http://www.youtube.com/watch?v=abcxyz123
            else{
                $video_query = parse_url( $video_id, PHP_URL_QUERY );
                parse_str( $video_query, $video_params );
//            debug_continue($video_params);
                $video_id = $video_params['v'];
            }

        }

        return $video_id;

    }
}

if (!function_exists('storeImage')) {

    function storeImage(
        $image = null,
        $imagePath = 'uploads/images',
        $createThumbnail = false,
        $width = 200,
        $height = 300
    ) {

        if ($image) {
            $original_name = $image->getClientOriginalName();
            $extension = strrchr($original_name, '.');
            $hash = md5($original_name . time());
            $original_filename = $hash . $extension;
            if (!is_dir(public_path($imagePath))) {
                @mkdir(public_path($imagePath), 0777, true);
            }

            if (in_array(strtolower($extension), [
                '.jpg',
                '.png',
                '.jpeg',
                '.gif'
            ])) {


                \Intervention\Image\ImageManagerStatic::make($image->getRealPath())->orientate()->save(public_path($imagePath) . '/' . $original_filename);
                if ($createThumbnail) {
                    $filename = $hash . '_thumb' . $extension;
                    \Intervention\Image\ImageManagerStatic::make($image->getRealPath())->orientate()->resize($width,
                        $height, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path($imagePath) . '/' . $filename);
                }

                return [
                    'path' => $createThumbnail ? $imagePath . '/' . $filename : '',
                    'original_path' => $imagePath . '/' . $original_filename,
                    'original_name' => $original_name,
                    'type' => 'image'
                ];
                
            }else{
                $image->move($imagePath,  $original_filename);
                return [
                    'path' =>  $imagePath . '/' . $original_filename ,
                    'original_path' => $imagePath . '/' . $original_filename,
                    'original_name' => $original_name,
                    'type' => 'file'
                ];
            }
        }

        return false;
    }
}

if(!function_exists('lang')){

    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    function lang(){
        return session('lang', 'en');
    }
}

if(!function_exists('deleteFile')){

    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    function deleteFile($file){
        if (is_file(public_path($file))) {
            @unlink(public_path($file));
        }
    }
}
