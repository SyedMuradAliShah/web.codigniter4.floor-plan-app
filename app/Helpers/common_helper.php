<?php

if (!function_exists('selected_input')) {

    /**
     * It will add selected to the option of a select.
     * 
     * @param mixed $field 
     * @param mixed $value 
     * @param string $method default is GET you can set POST
     * @return string 
     */
    function selected_input($field, $value, $method = "GET")
    {
        $request = \Config\Services::request();
        if ($method == "GET")
            return ($request->getGet($field) == $value) ? "selected" : "";
        else
            return ($request->getPost($field) == $value) ? "selected" : "";
    }
}

if (!function_exists('selected')) {

    /**
     * It will add selected to the option of a select.
     * 
     * @param mixed $value value of the option
     * @param mixed $databas_value value of the database
     * @return string 
     */
    function selected($value, $databas_value)
    {
        return ($value == $databas_value) ? "selected" : "";
    }
}

if (!function_exists('status_color')) {
    /**
     * It returns the color of the status
     * 
     * @param value The value of the status.
     */
    function status_color($value)
    {
        $status = ['pending verification' => 'warning', 'pending' => 'warning', 'in progress' => 'info', 'active' => 'success', 'success' => 'success', 'completed' => 'success', 'failed' => 'dark', 'refunded' => 'primary', 'fraud' => 'danger', 'cancelled' => 'danger', 'discontinued' => 'danger', 'disputed' => 'danger', 'danger' => 'danger', 'blocked' => 'danger', 'suspended' => 'info'];
        return isset($status[$value]) ? $status[$value] : "danger";
    }
}

if (!function_exists('get_countries')) {
    /**
     * Get the user data from the session.
     * 
     * @return array
     */
    function get_countries()
    {
        return array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    }
}

if (!function_exists('uri_segements')) {

    function uri_segements(array $segments = [], string $uri_string = null)
    {
        $uri = service('uri');

        if (empty($segments)) {
            return $uri_string;
        }

        $new_uri = '';

        foreach ($segments as $segment) {
            $new_uri .= "{$uri->getSegment($segment)}/";
        }

        return !is_null($uri_string) ? "{$new_uri}{$uri_string}" : $new_uri;
    }
}

if (!function_exists('get_initials')) {
    /**
     * @return string
     */
    function get_initials($string = null)
    {
        if (is_null($string)) {
            return '';
        }

        return array_reduce(
            explode(' ', $string),
            function ($initials, $word) {
                return sprintf('%s%s', $initials, substr($word, 0, 1));
            },
            ''
        );
    }
}

if (!function_exists('create_password')) {
    /**
     * @param string $password it is the password given by the users
     */
    function create_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}


if (!function_exists('compare_password')) {
    /**
     * @param string $password it is the password given by the users
     * @param string $compare_with it is the password already in the database
     */
    function compare_password($password, $compare_with)
    {
        return password_verify($password, $compare_with);
    }
}


if (!function_exists('assets_url')) {
    /**
     * It will return the path of the assets folder.
     * 
     * @param mixed $uri it will be url, like images/etc.png
     * @return mixed it will return full url http://localhost/public/assets/images/etc.png
     */
    function assets_url($uri = '')
    {
        return base_url("public/assets/{$uri}");
    }
}


if (!function_exists('images_url')) {
    /**
     * public/images It will return the path of the public folder. 
     * 
     * @param mixed $uri it will be url, like etc.png
     * @return mixed it will return full url http://localhost/public/images/etc.png
     */
    function images_url($uri = '')
    {
        return base_url("public/images/{$uri}");
    }
}

if (!function_exists('public_url')) {
    /**
     * It will return the path of the public folder.
     * 
     * @param mixed $uri it will be url, like images/etc.png
     * @return mixed it will return full url http://localhost/public/images/etc.png
     */
    function public_url($uri = '')
    {
        return base_url("public/{$uri}");
    }
}

if (!function_exists('is_post')) {

    /**
     * If the method of request is POST return true else false.
     * 
     *  @return bool  */
    function is_post()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')  ? true : false;
    }
}

if (!function_exists('is_get')) {

    /**
     * If the method of request is GET return true else false.
     * 
     *  @return bool  */
    function is_get()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET')  ? true : false;
    }
}


if (!function_exists('input_print')) {

    /**
     * To print inside a input field use this.
     * 
     *  @return mixed  */
    function input_print($str)
    {

        return htmlentities($str ?? '');
    }
}


if (!function_exists('print_output')) {

    /**
     * To print inside a input field use this.
     * 
     *  @return mixed  */
    function print_output($str)
    {

        return htmlentities($str ?? '');
    }
}

if (!function_exists('rating_stars')) {
    /**
     * It will convert objectArray to Simple Array
     *
     * @param string        $subject will be the bold frist text or alert
     * @param string        $message will be the alert message
     * @param string        $type will be error|success|info|warning
     * @return string      
     */
    function rating_stars($rating, $li = true)
    {
        $rating_rounded = floor($rating);
        $remaining = $rating - $rating_rounded;

        switch ($rating_rounded) {
            case 0:
                $stars = [
                    'orange' => 0,
                    'grey' => 5
                ];
                break;
            case 1:
                $stars = [
                    'orange' => 1,
                    'grey' => 4
                ];
                break;
            case 2:
                $stars = [
                    'orange' => 2,
                    'grey' => 3
                ];
                break;
            case 3:
                $stars = [
                    'orange' => 3,
                    'grey' => 2
                ];
                break;
            case 4:
                $stars = [
                    'orange' => 4,
                    'grey' => 1
                ];
                break;
            case 5:
                $stars = [
                    'orange' => 5,
                    'grey' => 0
                ];
                break;
            default:
                $stars = [
                    'orange' => 0,
                    'grey' => 5
                ];
        }
        $return_data = '';


        for ($i = 0; $i < $stars['orange']; $i++)
            $return_data .= '<li><i class="fas fa-star filled"></i></li>';

        if ($remaining > 0) {
            for ($i = 0; $i < $stars['grey']; $i++)
                if ($i == 0)
                    $return_data .= '<li><i class="fas fa-star-half-alt filled"></i></li>';
                else
                    $return_data .= '<li><i class="far fa-star"></i></li>';
        } else
            for ($i = 0; $i < $stars['grey']; $i++)
                $return_data .= '<li><i class="far fa-star"></i></li>';
        if (!$li) {
            $return_data = str_replace('<li>', '', $return_data);
            $return_data = str_replace('</li>', '', $return_data);
        }

        return $return_data;
    }
}

if (!function_exists('short_description')) {

    /**
     * It will write short description of words.
     * 
     * @param mixed $text it will be description.
     * @param int $limit it will be the number of words.
     * @return string 
     */
    function short_description($text, $limit = 30)
    {
        $text = strip_tags($text);

        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}

if (!function_exists('image')) {

    /**
     * It will return image thumbnail or full image.
     * 
     * @param mixed $path send full image /public/images
     * @param mixed $fileName image file name
     * @return mixed 
     */
    function image($path, $fileName, $is_thumb = true)
    {
        try {

            $path = '/' . trim($path, '/');

            if (is_null($fileName) || empty($fileName))
                return "public/no-image.png";

            $current_path = getcwd() . $path . '/';

            $imageParts = pathinfo($fileName);

            $extension = $imageParts['extension'];
            $filename = $imageParts['filename'];
            if ($is_thumb)
                return (file_exists("{$current_path}{$filename}_thumb.{$extension}")) ? "{$path}/{$filename}_thumb.{$extension}" : ((file_exists("{$current_path}{$fileName}")) ? "{$path}/{$fileName}" : "public/no-image.png");
            else
                return ((file_exists("{$current_path}{$fileName}")) ? "{$path}/{$fileName}" : "public/no-image.png");
                
        } catch (Exception $e) {
            return "public/no-image.png";
        }
    }
}


if (!function_exists('is_image')) {

    /**
     * It will return true or false.
     * 
     * @param mixed $path send full image /public/images
     * @param mixed $fileName image file name
     * @return bool 
     */
    function is_image($path, $fileName)
    {
        if (!isset($fileName))
            return false;

        $current_path = getcwd() . '/' . trim($path, '/') . '/';

        $imageParts = pathinfo($fileName);

        $extension = $imageParts['extension'];
        $filename = $imageParts['filename'];

        return (file_exists("{$current_path}{$filename}_thumb.{$extension}")) ? true : ((file_exists("{$current_path}{$fileName}")) ? true : false);
    }
}

if (!function_exists('price')) {

    /**
     * Return price after discount in currency format
     * 
     * @param mixed $amount it will be the amount
     * @param mixed $discount it will be the discounted amount
     * @param mixed $discount_type it will be percentage or price.
     * @return string 
     */
    function price($amount, $discount, $discount_type)
    {
        $new_amount = $amount;

        if ($discount_type == 'percentage')
            $new_amount = $amount - (($amount / 100) * $discount);
        elseif ($discount_type == 'price')
            $new_amount = $amount - $discount;

        return $new_amount;
    }
}


if (!function_exists('convert_price')) {
    /**
     * This function will return the value will price format.
     * 
     * @param float $price It will be the price
     * @param int $decimal upto how much decimal default is 2.
     * @param string $common seperate thousands by comma or none, default is none 
     * @param string $point seperate decimal by default is dot
     * @return string 
     */
    function convert_price($price, $decimal = 2, $comma = ',', $point = '.')
    {
        return number_format($price, $decimal, $point, $comma);
    }
}



/* End of file common.php and path \application\helpers\common_helper.php */
