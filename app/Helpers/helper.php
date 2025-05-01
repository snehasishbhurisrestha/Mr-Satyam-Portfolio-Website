<?php
    use Illuminate\Support\Str;
    use App\Models\Product;
    use App\Models\ProductImages;
    use App\Models\User;
    use App\Models\Blog;
    use App\Models\Testimonial;

    if (!function_exists('format_date_for_db')) {
        function format_date_for_db($datetime)
        {
            // Parse the datetime string into a Carbon instance
            $carbonDatetime = \Illuminate\Support\Carbon::parse($datetime);
            
            // Format the datetime using the desired format
            return $carbonDatetime->format('Y-m-d');
        }
    }

    if (!function_exists('format_time_for_db')) {
        function format_time_for_db($time)
        {
            // Parse the datetime string into a Carbon instance
            $carbonTime = \Illuminate\Support\Carbon::parse($time);
            
            // Format the datetime using the desired format
            return $carbonTime->format('h:i');
        }
    }

    if (!function_exists('format_datetime')) {
        function format_datetime($datetime)
        {
            // Parse the datetime string into a Carbon instance
            $carbonDatetime = \Illuminate\Support\Carbon::parse($datetime);
            
            // Format the datetime using the desired format
            return $carbonDatetime->format('F d, Y h:i A');
        }
    }

    if (!function_exists('format_date')) {
        function format_date($datetime)
        {
            // Parse the datetime string into a Carbon instance
            $carbonDatetime = \Illuminate\Support\Carbon::parse($datetime);
            
            // Format the datetime using the desired format
            return $carbonDatetime->format('d F, Y');
        }
    }

    if (!function_exists('formated_time')) {
        function formated_time($time)
        {
            return date('h:i A', strtotime($time));
        }
    }

    if (!function_exists('calculate_time_difference')) {
        function calculate_time_difference($start_time, $end_time, $standard_format = false)
        {
            $start = new DateTime($start_time);
            $end = new DateTime($end_time);
            $interval = $start->diff($end);
            $hours = $interval->h;
            $minutes = $interval->i;
            $seconds = $interval->s;
            $hours += ($interval->d * 24);
            if ($standard_format) {
                return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
            } else {
                return sprintf('%dh %dm %ds', $hours, $minutes, $seconds);
            }
        }
    }
    

    if (!function_exists('check_status')){
        function check_status($status){
            if($status == 1){
                $str = '<span class="badge bg-success text-light" style="font-size:15px;">Active</span>';
            }else{
                $str = '<span class="badge bg-danger text-light" style="font-size:15px;">Inactive</span>';
            }
            return $str;
        }
    }

    if (!function_exists('check_verified')){
        function check_verified($status){
            if($status == 1){
                $str = '<span class="text-success" title="Verified"><i class="fas fa-check-circle"></i></span></p>';
            }else{
                $str = '<span class="text-danger" title="Not Verified"><i class="fas fa-times-circle"></i></span></p>';
            }
            return $str;
        }
    }

    if (!function_exists('check_visibility')) {
        function check_visibility($val)
        {
            if($val==1){
                $str='<span class="btn btn-success btn-sm"><i class="fas fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Visible"></i></span>';
            }else{
                $str='<span class="btn btn-danger btn-sm"><i class="fas fa-eye-slash" data-bs-toggle="tooltip" data-bs-placement="top" title="Not Visible"></i></span>';
            }
            return $str;
        }
    }

    if (!function_exists('check_uncheck')) {
        function check_uncheck($val1,$val2)
        {
            if($val1==$val2){
                $str='checked';
            }else{
                $str='';
            }
            return $str;
        }
    }

    if (!function_exists('generateToken')) {
        function generateToken($length = 32) {
            $bytes = random_bytes($length);
            $apiKey = base64_encode($bytes);
            $urlSafeApiKey = str_replace(['+', '/', '='], ['-', ''], $apiKey);
            return $urlSafeApiKey;
        }
    }

    if (!function_exists('get_user_name')) {
        function get_user_name($field, $id){
            $user = DB::table('users')->where($field, $id)->first();
            if ($user) {
                return $user->name;
            } else {
                return null;
            }
        }
    }
    if (!function_exists('get_user_phone')) {
        function get_user_phone($id){
            $user = DB::table('users')->where('id', $id)->first();
            if ($user) {
                return $user->phone;
            } else {
                return null;
            }
        }
    }
    if (!function_exists('get_user_profile_pic')) {
        function get_user_profile_pic($id){
            $user = DB::table('users')->where('id', $id)->first();
            if ($user) {
                return $user->user_image;
            } else {
                return null;
            }
        }
    }

    if (!function_exists('get_name')){
        function get_name($table,$id){
            $data = DB::table($table)->where('id', $id)->first();
            if($data){
                return $data->name;
            }else{
                return '';
            }
        }
    }
    

    if (!function_exists('get_active_class')){
        function get_active_class($val){
            if($val == 1){
                return "member-header-active";
            }else{
                return "member-header-inactive";
            }
        }
    }

    if (!function_exists('is_active')){
        function is_active($val){
            if($val == 1){
                return "Active";
            }else{
                return "Inactive";
            }
        }
    }

    
    if (!function_exists('update_order_number')) {
        function update_order_number($order_id)
        {
            $data = array(
                'order_number' => $order_id + 10000
            );
            DB::table('orders')
            ->where('id', $order_id)
            ->update($data);
        }
    }

    if(!function_exists('createSlug')) {
        function createSlug($name, $model)
        {
            $slug = Str::slug($name);
            $originalSlug = $slug;

            $count = 1;
            while ($model::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            return $slug;
        }
    }

    if (!function_exists('is_have_image')) {
        function is_have_image($image) {
            if($image){
                return 'block';
            }else{
                return 'none';
            }
        }
    }

    if (!function_exists('get_product_by_id')) {
        function get_product_by_id($product_id){
            $product = Products::find($product_id);
            return $product;
        }
    }

    if (!function_exists('get_product_price_by_id')) {
        function get_product_price_by_id($product_id){
            $product = Products::find($product_id);
            return $product->price;
        }
    }

    if (!function_exists('get_user_last_order_date')) {
        function get_user_last_order_date($user_id){
            $order = Orders::where("buyer_id",$user_id)->latest()->first();
            if($order){
                return $order->updated_at;
            }else{
                return '';
            }
        }
    }

    if(!function_exists('get_product_image')){
        function get_product_image($product_id){
            $product_image = ProductImages::where('product_id',$product_id)->first();
            if(!empty($product_image)){
                return $product_image->images;
            }else{
                return '';
            }
        }
    }

    if (!function_exists('get_role')) {
        function get_role($user_id){
            $roleName = DB::table('roles')
            ->leftJoin('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->where('model_has_roles.model_id', $user_id)
            ->select('roles.name')
            ->first();
            return $roleName->name;
        }
    }

    
    if (!function_exists('get_all_products_by_category')) {
        function get_all_products_by_category($category_id){
            $products = DB::table('products')
            ->where('category', $category_id)
            ->get();
            return $products;
        }
    }

    if (!function_exists('get_daily_sales_products')) {
        function get_daily_sales_products($daily_sale_id){
            $products = DB::table('assigned_products')
            ->where('daily_sales', $daily_sale_id)
            ->value('products');
            return json_decode($products);
        }
    }

    if (!function_exists('get_category_id_by_product_id')) {
        function get_category_id_by_product_id($product_id){
            $category = DB::table('products')
            ->where('id', $product_id)
            ->value('category');
            if(!empty($category)){
                return $category;
            }else{
                return 0;
            }
        }
    }

    if(!function_exists('get_time_slots')){
        function get_time_slots($id){
            $time_slot = DB::table('time_slots')->where('id', $id)->first();
            if($time_slot){
                return formated_time($time_slot->start_time) .' - '. formated_time($time_slot->end_time);
            }else{
                return '';
            }
        }
    }


    if (!function_exists('truncateBlogDescription')) {
        function truncateBlogDescription(string $description): string
        {
            $maxLength = 115;

            // If the description is shorter than the limit, return it as-is.
            if (strlen($description) <= $maxLength) {
                return $description;
            }

            // Truncate without breaking words
            $truncated = substr($description, 0, $maxLength);

            // Ensure we don't break a word
            if (substr($description, $maxLength, 1) !== ' ' && strlen($description) > $maxLength) {
                $lastSpace = strrpos($truncated, ' ');
                $truncated = substr($truncated, 0, $lastSpace);
            }

            return $truncated . ' ...';
        }
    }

    if(!function_exists('is_have_blog')){
        function is_have_blog(){
            $blogs = Blog::where('is_visible',1)->count();
            if($blogs>0){
                return true;
            }else{
                return false;
            }
        }
    }

    if(!function_exists('is_have_testimonial')){
        function is_have_testimonial(){
            $testimonial = Testimonial::where('is_visible',1)->count();
            if($testimonial>0){
                return true;
            }else{
                return false;
            }
        }
    }

    if(!function_exists('getProductMainImage')){
        function getProductMainImage($productId){
            $product = Product::find($productId);

            if (!$product) {
                return null;
            }
            $mainImage = $product->getMedia('products-media')
                ->firstWhere('custom_properties.is_main', true);

            return $mainImage ? $mainImage->getUrl() : null;
        }
    }
