<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Kreait\Firebase;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Factory;
use Illuminate\Support\Str;



function saveFileInStorage($request,$name,$store_as_path,$file_name){
    if ($request->hasFile($file_name)) {
        $request->file($file_name)->storeAs($store_as_path,$name, 'public');
        return "$store_as_path/$name";
    }
}
// function shorten_URL() {
//     $url = 'https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=AIzaSyBWFhV1dacHx8KVHHea7bMfkSOfADydYcw';
//     $data = array(
//         'longDynamicLink' => "https://snder.page.link/?link=https://snder.co/product?id=23&apn=com.snder.app",
//     );

//     $headers = array('Content-Type: application/json');

//     $ch = curl_init ();
//     curl_setopt ( $ch, CURLOPT_URL, $url );
//     curl_setopt ( $ch, CURLOPT_POST, true );
//     curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
//     curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
//     curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );

//     $data = curl_exec ( $ch );
//     curl_close ( $ch );

//     $short_url = json_decode($data);
//     if(isset($short_url->error)){
//         return $short_url->error->message;
//     } else {
//         return $short_url->shortLink;
//     }

// }

function format_moment_date($time)
{

    date_default_timezone_set('UTC');
    $time_ago = strtotime($time);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks = round($seconds / 604800); // 7*24*60*60;
    $months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {
        $out = '';
        app()->getLocale() == 'ar' ? $out = "الآن" : $out = "Now";
        return $out;

    } else if ($minutes <= 60) {

        if ($minutes == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ دقيقة" : $out = "minute ago";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ $minutes دقائق " : $out = "$minutes minutes ago";
            return $out;
        }

    } else if ($hours <= 24) {

        if ($hours == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ ساعة" : $out = "hour ago";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = " منذ $hours ساعات " : $out = "$hours hours ago";
            return $out;

        }

    } else if ($days <= 7) {

        if ($days == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "الأمس" : $out = "yesterday";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ $days أيام " : $out = "$days days ago";
            return $out;

        }

    } else if ($weeks <= 4.3) {

        if ($weeks == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ أسبوع" : $out = "week ago";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = " منذ $weeks أسابيع " : $out = "$weeks weeks ago";
            return $out;

        }

    } else if ($months <= 12) {

        if ($months == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ شهر" : $out = "month ago";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ $months أشهر " : $out = "$months months ago";
            return $out;
        }

    } else {

        if ($years == 1) {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ سنة" : $out = "year ago";
            return $out;

        } else {
            $out = '';
            app()->getLocale() == 'ar' ? $out = "منذ $years سنوات  " : $out = "$years years ago";
            return $out;

        }
    }
}


function uploadFileImageFromUrl($file, $path = '')
{

    $ImageName = Str::random(16) . '.png' ;
    $FolderName = Carbon::now()->toDateString();
    $ImagePath = public_path() . '/uploads/photos/' . $path . '/' . $FolderName . '/';
    // check if directory for ProfileImage  exists, if not then create one
    if (!File::exists($ImagePath)) {
        File::makeDirectory($ImagePath, 0777, true);
    }
    // save the ProfileImage as it is
    try
    {
        Image::make($file)->interlace(true)->save($ImagePath . $ImageName);
        return '/uploads/photos/'. $path . '/' . $FolderName . '/' . $ImageName;
    }
    catch(\Intervention\Image\Exception\NotReadableException $e)
    {
        return false;
    }

}

function uploadFileImage($file, $path = '')
{

    $ImageName = Str::random(16) . '.' . $file->getClientOriginalExtension();
    $FolderName = Carbon::now()->toDateString();
    $ImagePath = public_path() . '/uploads/photos/' . $path . '/' . $FolderName . '/';
    // check if directory for ProfileImage  exists, if not then create one
    if (!File::exists($ImagePath)) {
        File::makeDirectory($ImagePath, 0777, true);
    }
    // save the ProfileImage as it is
    try
    {
        Image::make($file->getRealPath())->interlace(true)->save($ImagePath . $ImageName);
        return '/uploads/photos/'. $path . '/' . $FolderName . '/' . $ImageName;
    }
    catch(\Intervention\Image\Exception\NotReadableException $e)
    {
        return false;
    }

}



function admin($key, $placeholder = [], $locale = null)
{

    $group = 'admin';
    if (is_null($locale))
        $locale = config('app.locale');
    $key = trim($key);
    $word = $group . '.' . $key;
    if (Lang::has($word))
        return trans($word, $placeholder, $locale);

    $messages = [
        $word => $key,
    ];

    app('translator')->addLines($messages, $locale);
    $langs = ['ar', 'en'];
    foreach ($langs as $lang) {
        $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
        $fh = fopen($translation_file, 'r+');
        $new_key = "  \n  '$key' => '$key',\n];\n";
        fseek($fh, -4, SEEK_END);
        fwrite($fh, $new_key);
        fclose($fh);
    }
    return trans($word, $placeholder, $locale);
//    return $key;

}
function web($key, $placeholder = [], $locale = null)
{

    $group = 'web';
    if (is_null($locale))
        $locale = config('app.locale');
    $key = trim($key);
    $word = $group . '.' . $key;
    if (Lang::has($word))
        return trans($word, $placeholder, $locale);

    $messages = [
        $word => $key,
    ];

    app('translator')->addLines($messages, $locale);
    $langs = ['ar', 'en'];
    foreach ($langs as $lang) {
        $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
        $fh = fopen($translation_file, 'r+');
        $new_key = "  \n  '$key' => '$key',\n];\n";
        fseek($fh, -4, SEEK_END);
        fwrite($fh, $new_key);
        fclose($fh);
    }
    return trans($word, $placeholder, $locale);
//    return $key;

}
function api($key, $placeholder = [], $locale = null)
{

    $group = 'api';
    if (is_null($locale))
        $locale = config('app.locale');
    $key = trim($key);
    $word = $group . '.' . $key;
    if (Lang::has($word))
        return trans($word, $placeholder, $locale);

    $messages = [
        $word => $key,
    ];

    app('translator')->addLines($messages, $locale);
    $langs = ['ar', 'en'];
    foreach ($langs as $lang) {
        $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
        $fh = fopen($translation_file, 'r+');
        $new_key = "    '$key' => '$key',\n];\n";
        fseek($fh, -4, SEEK_END);
        fwrite($fh, $new_key);
        fclose($fh);
    }
    return trans($word, $placeholder, $locale);
//    return $key;

}

function isRtl()
{
    return app()->getLocale() === 'ar';
}

function isRtlJS()
{
    return app()->getLocale() === 'ar' ? 'true' : 'false';
}

function direction($dot = '')
{
    return isRtl() ? 'rtl' . $dot : '';
}

function currentLanguage()
{
    return app()->getLocale();
}

function MimeFile($extension)
{
    /*
     Video Type     Extension       MIME Type
    Flash           .flv            video/x-flv
    MPEG-4          .mp4            video/mp4
    iPhone Index    .m3u8           application/x-mpegURL
    iPhone Segment  .ts             video/MP2T
    3GP Mobile      .3gp            video/3gpp
    QuickTime       .mov            video/quicktime
    A/V Interleave  .avi            video/x-msvideo
    Windows Media   .wmv            video/x-ms-wmv
    */
    $ext_photos = ['png', 'jpg', 'jpeg', 'gif'];
    return in_array($extension, $ext_photos) ? 'photo' : 'video';

}

function split_string($string, $count = 2)
{

//Using the explode method
    $arr_ph = explode(" ", $string, $count);

    if (!isset($arr_ph[1]))
        $arr_ph[1] = '';
    return $arr_ph;

}

function send_sms($mobile, $code)
{
    $url = 'your  url here';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function nearest($lat, $lng, $radius = 1)
{

    // Km
    $angle_radius = $radius / 111;
    $location['min_lat'] = $lat - $angle_radius;
    $location['max_lat'] = $lat + $angle_radius;
    $location['min_lng'] = $lng - $angle_radius;
    $location['max_lng'] = $lng + $angle_radius;

    return (object)$location;

}

function distance($lat1, $lon1, $lat2, $lon2, $unit)
{

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}

function DistanceFromLatLonInKm($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $lonDelta = $lonTo - $lonFrom;
    $a = pow(cos($latTo) * sin($lonDelta), 2) +
        pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
    $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

    $angle = atan2(sqrt($a), $b);
    return $angle * $earthRadius;
}

function assets($path = '', $relative = false)
{
    return $relative ? 'public/' . $path : url('public/' . $path);
}

function slug($string)
{
    return preg_replace('/\s+/u', '-', trim($string));
}

function generateRandomString($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomVerificationCode($length = 4)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateInvoiceNumber($model)
{
    $year = date('Y');
    $expNum = 0;
//get last record
    $record = $model::latest()->first();
    if ($record)
        list($year, $expNum) = explode('-', $record->invoice_id);

//check first day in a year
    if (date('z') === '0') {
        $nextInvoiceNumber = date('Y') . '-0001';
    } else {
        //increase 1 with last invoice number
        $nextInvoiceNumber = $year . '-' . ((int)$expNum + 1);
    }

    return $nextInvoiceNumber;
//now add into database $nextInvoiceNumber as a next number.
}

function defaultImage()
{
    return asset("/uploads/placeholder/default_image.png");
}

function status($status, $type = '')
{
    $color = [
        '0' => 'danger',
        '1' => 'success',
        'pending' => 'warning',
        'active' => 'success',
        'accepted' => 'success',
        'delayed' => 'default',
        'rejected' => 'danger',
        'cancelled' => 'default',
        'inactive' => 'danger',
        'waiting' => 'warning',
        'acceptable' => 'info',
        'unacceptable' => 'danger',
        'winners' => 'success',
        'done' => 'success',
        'pass' => 'info',
        'shipping' => 'warning',
        'new' => 'warning',
        'completed' => 'success',

    ];

    $text = [
        '0' => admin('admin.Inactive'),
        '1' => admin('admin.Active'),
        'pending' => admin('admin.Pending'),
        'active' => admin('admin.Active'),
        'accepted' => 'مقبول',
        'delayed' => 'مؤجل',
        'rejected' => 'مرفوض',
        'cancelled' => admin('admin.Cancelled'),
        'inactive' => admin('admin.inactive'),
        'waiting' => admin('admin.waiting'),
        'acceptable' => 'مقبول',
        'unacceptable' => 'مرفوض',
        'winners' => 'فائز',
        'done' => admin('admin.Done'),
        'pass' => 'تم تمريرها',
        'shipping' => admin('admin.Shipping'),
        'new' => admin('admin.New'),
        'completed' => admin('admin.completed'),
    ];

    if ($type == 't')
        return $text[$status];

    if ($type == 'c')
        return $color[$status];


    return "<label class='label label-mini label-{$color[$status]}'>{$text[$status]}<label>";
}

function pic($src, $class = 'full')
{
    $html = "<img class='  " . $class . "' src='" . asset($src) . "'>";
    return $html;
}

function ext($filename, $style = false)
{

    //$ext = File::extension($filename);

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!$style)
        return $ext;
    return $html = "<img class='' src='" . asset('public/assets/img/ext/' . $ext . '.png') . "'>";
}

function IsLang($lang = 'ar')
{
    return session('lang') == $lang;
}

function CurrentLang()
{
    return session('lang', 'en');
}

function rating($val, $max = 5)
{
    $html = '';
    for ($i = 1; $i <= $max; $i++) {

        if ($i <= $val)
            $html .= "<span><i class='fa fa-star fa-lg active'></i></span>";
        else
            $html .= "<span><i class='fa fa-star-o fa-lg '></i></span>";
    }
    return $html;
}

function isAPI()
{
    return request()->is('api/*');
}

function versions()
{
    return ['v1'];
}

function base64ToFile($data)
{
    $file_name = 'attach_' . time() . '.' . getExtBase64($data);
    $path = 'uploads/user_attachments/' . $file_name;
    $uploadPath = public_path($path);
    if (!file_put_contents($uploadPath, base64_decode($data))) ;
    $path = '';
    return $path;
}

function getExtBase64($data)
{

    $pos = strpos($data, ';');
    $mimi = explode(':', substr($data, 0, $pos))[1];
    return $ext = explode('/', $mimi)[1];
}

function paginate($object)
{
    return [
        'current_page' => $object->currentPage(),
        //'items' => $object->items(),
        'first_page_url' => $object->url(1),
        'from' => $object->firstItem(),
        'last_page' => $object->lastPage(),
        'last_page_url' => $object->url($object->lastPage()),
        'next_page_url' => $object->nextPageUrl(),
        'per_page' => $object->perPage(),
        'prev_page_url' => $object->previousPageUrl(),
        'to' => $object->lastItem(),
        'total' => $object->total(),
    ];
}

function paginate_message($object)
{

    $items = [];
    foreach ($object->items() as $key => $item) {
        foreach ($item['data'] as $k => $val) {
            $items[$key][$k] = $val;
        }
        $items[$key]['notification_id'] = $item->id;
        $items[$key]['created_at'] = $item->created_at->format('Y-m-d H:i:s');
    }

    return [
        'current_page' => $object->currentPage(),
        'items' => $items,
        'first_page_url' => $object->url(1),
        'from' => $object->firstItem(),
        'last_page' => $object->lastPage(),
        'last_page_url' => $object->url($object->lastPage()),
        'next_page_url' => $object->nextPageUrl(),
        'per_page' => $object->perPage(),
        'prev_page_url' => $object->previousPageUrl(),
        'to' => $object->lastItem(),
        'total' => $object->total(),
    ];
}

function getOnly($only, $array)
{
    $data = [];
    foreach ($only as $id) {
        if (isset($array[$id])) {
            $data[$id] = $array[$id];
        }
    }
    return $data;
}

function status_text($status)
{

    $title = ['pending' => 'المعلقة', 'accepted' => 'المقبولة', 'cancelled' => 'الملغية', 'rejected' => 'المرفوضة'];

    return $title[$status];

}

function destroyFile($file)
{

    if (!empty($file) and File::exists(public_path($file))){
       if( File::delete(public_path($file))){
           return true;
       }

       return false;
    }
      

}

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $html = curl_exec($ch);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function arabic_date($datetime)
{

    $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
    $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
    $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

    $_month = $months[date('M', strtotime($datetime))];
    $_day = $days[date('D', strtotime($datetime))];
    $_day = date('d', strtotime($datetime));
    $_time = date('h:i', strtotime($datetime));
    $_am_pm = $am_pm[date('A', strtotime($datetime))];

    return '(' . $_day . ' ' . $_month . ' - ' . $_time . ' ' . $_am_pm . ')';

}

function convertToUnicode($message)
{
    $chrArray[0] = "¡";
    $unicodeArray[0] = "060C";
    $chrArray[1] = "º";
    $unicodeArray[1] = "061B";
    $chrArray[2] = "¿";
    $unicodeArray[2] = "061F";
    $chrArray[3] = "Á";
    $unicodeArray[3] = "0621";
    $chrArray[4] = "Â";
    $unicodeArray[4] = "0622";
    $chrArray[5] = "Ã";
    $unicodeArray[5] = "0623";
    $chrArray[6] = "Ä";
    $unicodeArray[6] = "0624";
    $chrArray[7] = "Å";
    $unicodeArray[7] = "0625";
    $chrArray[8] = "Æ";
    $unicodeArray[8] = "0626";
    $chrArray[9] = "Ç";
    $unicodeArray[9] = "0627";
    $chrArray[10] = "È";
    $unicodeArray[10] = "0628";
    $chrArray[11] = "É";
    $unicodeArray[11] = "0629";
    $chrArray[12] = "Ê";
    $unicodeArray[12] = "062A";
    $chrArray[13] = "Ë";
    $unicodeArray[13] = "062B";
    $chrArray[14] = "Ì";
    $unicodeArray[14] = "062C";
    $chrArray[15] = "Í";
    $unicodeArray[15] = "062D";
    $chrArray[16] = "Î";
    $unicodeArray[16] = "062E";
    $chrArray[17] = "Ï";
    $unicodeArray[17] = "062F";
    $chrArray[18] = "Ð";
    $unicodeArray[18] = "0630";
    $chrArray[19] = "Ñ";
    $unicodeArray[19] = "0631";
    $chrArray[20] = "Ò";
    $unicodeArray[20] = "0632";
    $chrArray[21] = "Ó";
    $unicodeArray[21] = "0633";
    $chrArray[22] = "Ô";
    $unicodeArray[22] = "0634";
    $chrArray[23] = "Õ";
    $unicodeArray[23] = "0635";
    $chrArray[24] = "Ö";
    $unicodeArray[24] = "0636";
    $chrArray[25] = "Ø";
    $unicodeArray[25] = "0637";
    $chrArray[26] = "Ù";
    $unicodeArray[26] = "0638";
    $chrArray[27] = "Ú";
    $unicodeArray[27] = "0639";
    $chrArray[28] = "Û";
    $unicodeArray[28] = "063A";
    $chrArray[29] = "Ý";
    $unicodeArray[29] = "0641";
    $chrArray[30] = "Þ";
    $unicodeArray[30] = "0642";
    $chrArray[31] = "ß";
    $unicodeArray[31] = "0643";
    $chrArray[32] = "á";
    $unicodeArray[32] = "0644";
    $chrArray[33] = "ã";
    $unicodeArray[33] = "0645";
    $chrArray[34] = "ä";
    $unicodeArray[34] = "0646";
    $chrArray[35] = "å";
    $unicodeArray[35] = "0647";
    $chrArray[36] = "æ";
    $unicodeArray[36] = "0648";
    $chrArray[37] = "ì";
    $unicodeArray[37] = "0649";
    $chrArray[38] = "í";
    $unicodeArray[38] = "064A";
    $chrArray[39] = "Ü";
    $unicodeArray[39] = "0640";
    $chrArray[40] = "ð";
    $unicodeArray[40] = "064B";
    $chrArray[41] = "ñ";
    $unicodeArray[41] = "064C";
    $chrArray[42] = "ò";
    $unicodeArray[42] = "064D";
    $chrArray[43] = "ó";
    $unicodeArray[43] = "064E";
    $chrArray[44] = "õ";
    $unicodeArray[44] = "064F";
    $chrArray[45] = "ö";
    $unicodeArray[45] = "0650";
    $chrArray[46] = "ø";
    $unicodeArray[46] = "0651";
    $chrArray[47] = "ú";
    $unicodeArray[47] = "0652";
    $chrArray[48] = "!";
    $unicodeArray[48] = "0021";
    $chrArray[49] = '"';
    $unicodeArray[49] = "0022";
    $chrArray[50] = "#";
    $unicodeArray[50] = "0023";
    $chrArray[51] = "$";
    $unicodeArray[51] = "0024";
    $chrArray[52] = "%";
    $unicodeArray[52] = "0025";
    $chrArray[53] = "&";
    $unicodeArray[53] = "0026";
    $chrArray[54] = "'";
    $unicodeArray[54] = "0027";
    $chrArray[55] = "(";
    $unicodeArray[55] = "0028";
    $chrArray[56] = ")";
    $unicodeArray[56] = "0029";
    $chrArray[57] = "*";
    $unicodeArray[57] = "002A";
    $chrArray[58] = "+";
    $unicodeArray[58] = "002B";
    $chrArray[59] = ",";
    $unicodeArray[59] = "002C";
    $chrArray[60] = "-";
    $unicodeArray[60] = "002D";
    $chrArray[61] = ".";
    $unicodeArray[61] = "002E";
    $chrArray[62] = "/";
    $unicodeArray[62] = "002F";
    $chrArray[63] = "0";
    $unicodeArray[63] = "0030";
    $chrArray[64] = "1";
    $unicodeArray[64] = "0031";
    $chrArray[65] = "2";
    $unicodeArray[65] = "0032";
    $chrArray[66] = "3";
    $unicodeArray[66] = "0033";
    $chrArray[67] = "4";
    $unicodeArray[67] = "0034";
    $chrArray[68] = "5";
    $unicodeArray[68] = "0035";
    $chrArray[69] = "6";
    $unicodeArray[69] = "0036";
    $chrArray[70] = "7";
    $unicodeArray[70] = "0037";
    $chrArray[71] = "8";
    $unicodeArray[71] = "0038";
    $chrArray[72] = "9";
    $unicodeArray[72] = "0039";
    $chrArray[73] = ":";
    $unicodeArray[73] = "003A";
    $chrArray[74] = ";";
    $unicodeArray[74] = "003B";
    $chrArray[75] = "<";
    $unicodeArray[75] = "003C";
    $chrArray[76] = "=";
    $unicodeArray[76] = "003D";
    $chrArray[77] = ">";
    $unicodeArray[77] = "003E";
    $chrArray[78] = "?";
    $unicodeArray[78] = "003F";
    $chrArray[79] = "@";
    $unicodeArray[79] = "0040";
    $chrArray[80] = "A";
    $unicodeArray[80] = "0041";
    $chrArray[81] = "B";
    $unicodeArray[81] = "0042";
    $chrArray[82] = "C";
    $unicodeArray[82] = "0043";
    $chrArray[83] = "D";
    $unicodeArray[83] = "0044";
    $chrArray[84] = "E";
    $unicodeArray[84] = "0045";
    $chrArray[85] = "F";
    $unicodeArray[85] = "0046";
    $chrArray[86] = "G";
    $unicodeArray[86] = "0047";
    $chrArray[87] = "H";
    $unicodeArray[87] = "0048";
    $chrArray[88] = "I";
    $unicodeArray[88] = "0049";
    $chrArray[89] = "J";
    $unicodeArray[89] = "004A";
    $chrArray[90] = "K";
    $unicodeArray[90] = "004B";
    $chrArray[91] = "L";
    $unicodeArray[91] = "004C";
    $chrArray[92] = "M";
    $unicodeArray[92] = "004D";
    $chrArray[93] = "N";
    $unicodeArray[93] = "004E";
    $chrArray[94] = "O";
    $unicodeArray[94] = "004F";
    $chrArray[95] = "P";
    $unicodeArray[95] = "0050";
    $chrArray[96] = "Q";
    $unicodeArray[96] = "0051";
    $chrArray[97] = "R";
    $unicodeArray[97] = "0052";
    $chrArray[98] = "S";
    $unicodeArray[98] = "0053";
    $chrArray[99] = "T";
    $unicodeArray[99] = "0054";
    $chrArray[100] = "U";
    $unicodeArray[100] = "0055";
    $chrArray[101] = "V";
    $unicodeArray[101] = "0056";
    $chrArray[102] = "W";
    $unicodeArray[102] = "0057";
    $chrArray[103] = "X";
    $unicodeArray[103] = "0058";
    $chrArray[104] = "Y";
    $unicodeArray[104] = "0059";
    $chrArray[105] = "Z";
    $unicodeArray[105] = "005A";
    $chrArray[106] = "[";
    $unicodeArray[106] = "005B";
    $char = "\ ";
    $chrArray[107] = trim($char);
    $unicodeArray[107] = "005C";
    $chrArray[108] = "]";
    $unicodeArray[108] = "005D";
    $chrArray[109] = "^";
    $unicodeArray[109] = "005E";
    $chrArray[110] = "_";
    $unicodeArray[110] = "005F";
    $chrArray[111] = "`";
    $unicodeArray[111] = "0060";
    $chrArray[112] = "a";
    $unicodeArray[112] = "0061";
    $chrArray[113] = "b";
    $unicodeArray[113] = "0062";
    $chrArray[114] = "c";
    $unicodeArray[114] = "0063";
    $chrArray[115] = "d";
    $unicodeArray[115] = "0064";
    $chrArray[116] = "e";
    $unicodeArray[116] = "0065";
    $chrArray[117] = "f";
    $unicodeArray[117] = "0066";
    $chrArray[118] = "g";
    $unicodeArray[118] = "0067";
    $chrArray[119] = "h";
    $unicodeArray[119] = "0068";
    $chrArray[120] = "i";
    $unicodeArray[120] = "0069";
    $chrArray[121] = "j";
    $unicodeArray[121] = "006A";
    $chrArray[122] = "k";
    $unicodeArray[122] = "006B";
    $chrArray[123] = "l";
    $unicodeArray[123] = "006C";
    $chrArray[124] = "m";
    $unicodeArray[124] = "006D";
    $chrArray[125] = "n";
    $unicodeArray[125] = "006E";
    $chrArray[126] = "o";
    $unicodeArray[126] = "006F";
    $chrArray[127] = "p";
    $unicodeArray[127] = "0070";
    $chrArray[128] = "q";
    $unicodeArray[128] = "0071";
    $chrArray[129] = "r";
    $unicodeArray[129] = "0072";
    $chrArray[130] = "s";
    $unicodeArray[130] = "0073";
    $chrArray[131] = "t";
    $unicodeArray[131] = "0074";
    $chrArray[132] = "u";
    $unicodeArray[132] = "0075";
    $chrArray[133] = "v";
    $unicodeArray[133] = "0076";
    $chrArray[134] = "w";
    $unicodeArray[134] = "0077";
    $chrArray[135] = "x";
    $unicodeArray[135] = "0078";
    $chrArray[136] = "y";
    $unicodeArray[136] = "0079";
    $chrArray[137] = "z";
    $unicodeArray[137] = "007A";
    $chrArray[138] = "{";
    $unicodeArray[138] = "007B";
    $chrArray[139] = "|";
    $unicodeArray[139] = "007C";
    $chrArray[140] = "}";
    $unicodeArray[140] = "007D";
    $chrArray[141] = "~";
    $unicodeArray[141] = "007E";
    $chrArray[142] = "©";
    $unicodeArray[142] = "00A9";
    $chrArray[143] = "®";
    $unicodeArray[143] = "00AE";
    $chrArray[144] = "÷";
    $unicodeArray[144] = "00F7";
    $chrArray[145] = "×";
    $unicodeArray[145] = "00F7";
    $chrArray[146] = "§";
    $unicodeArray[146] = "00A7";
    $chrArray[147] = " ";
    $unicodeArray[147] = "0020";
    $chrArray[148] = "\n";
    $unicodeArray[148] = "000D";
    $chrArray[149] = "\r";
    $unicodeArray[149] = "000A";

    $strResult = "";
    for ($i = 0; $i < strlen($message); $i++) {
        if (in_array(substr($message, $i, 1), $chrArray))
            $strResult .= $unicodeArray[array_search(substr($message, $i, 1), $chrArray)];
    }
    return $strResult;
}
// function getDeepLink($id, $token)
// {
//     $client = new Client();

//     try {
//         $res = $client->post(
//             'https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=' . config('firebase_web_key'), [
//                 RequestOptions::JSON => [
//                     'longDynamicLink' => config('firebase_page_link') . '=' . url('/api/provider?' . "id=${id}%26token=${token}%26apn=firebase_package_name%26ibi=firebase_package_name"),
//                 ],
//                 'header' => [
//                     'Accept' => 'application/json',
//                     'Content-Type' => 'application/json',
//                 ],
//             ]
//         );
//         return \GuzzleHttp\json_decode($res->getBody()->getContents())->shortLink;
//     } catch (ClientException $exception) {
//         return 'unexpected error';
//     }


// }
