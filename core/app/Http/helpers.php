<?php

function message(){
    $msghtml = ' <div class="alert alert-'. Session::get('flash_notification.level') .'">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Message: </strong>'.Session::get('flash_notification.message').'</div>';
    return $msghtml;
}

function form_errors($errors){
    $error_list = '';
    foreach($errors->all() as $error){
        $error_list .= '- '.$error.'<br/>';
    }
    $errorsHtml = '<div class="alert alert-danger">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '.$error_list.'</div>';
    return $errorsHtml;
}

function show_btn($route, $id){
    $btn = '<a class="btn btn-info btn-sm" href="'.route($route, $id).'"><i class="fa fa-eye"></i> View</a>';
    return $btn;
}

function edit_btn($route, $id){
    $btn = '<a class="btn btn-success btn-sm" data-toggle="ajax-modal" href="'.route($route, $id).'"><i class="fa fa-pencil"></i> Edit</a>';
    return $btn;
}

function delete_btn($route, $id){
    $btn = Form::open(array("method"=>"DELETE", "route" => array($route, $id), 'class' => 'form-inline', 'style'=>'display:inline')).'
           <a class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i> Delete</a>'.Form::close();
    return $btn;
}

function get_company_name(){
    $settings = App\Models\Setting::first();
    $company_name = $settings ? str_limit($settings->name, 20, '')  : 'Classic Invoicer 2';
    return $company_name;
}

function get_languages(){
    $languages = App\Models\Locale::all();
    return $languages;
}

function get_current_language($lang){
    $language = \DB::table('locales')->where('short_name', $lang)->first();
    return $language;
}

function form_buttons(){
    $buttons = '<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Save</button>
                <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger"> <i class="fa fa-times"></i> Close</button>';
    return $buttons;
}

function statuses()
{
    return array(
        '0' => array(
            'label' => 'unpaid',
            'class' => 'label-warning'
        ),
        '1' => array(
            'label' => 'partially paid',
            'class' => 'label-primary'
        ),
        '2' => array(
            'label' => 'paid',
            'class' => 'label-success'
        ),
        '3' => array(
            'label' => 'overdue',
            'class' => 'label-danger'
        )
    );
}

function getStatus($field, $value)
{
    $statuses = statuses();
   foreach($statuses as $key => $status)
   {
       if ( $status[$field] === $value )
           return $key;
   }
   return false;
}

function parse_template($object, $body)
{
    if (preg_match_all('/\{(.*?)\}/', $body, $template_vars))
    {
        $replace ='';
        foreach ($template_vars[1] as $var)
        {
            switch (trim($var))
            {
                case 'invoice_number':
                    if(isset($object->invoice->number)){
                        $replace = $object->invoice->number;
                    }
                    break;
                case 'invoice_amount':

                    if(isset($object->invoice->totals['grandTotal'])){
                        $replace = $object->invoice->currency.$object->invoice->totals['grandTotal'];
                    }
                    break;
                case 'client_name':
                    if(isset($object->client->name)){
                        $replace = $object->client->name;
                    }
                    break;
                case 'client_email':
                    if(isset($object->client->email)){
                        $replace = $object->client->email;
                    }
                    break;
                case 'client_number':
                    if(isset($object->client->lient_no)){
                        $replace = $object->client->lient_no;
                    }
                    break;
                case 'company_name':
                    if(isset($object->settings->name)){
                        $replace = $object->settings->name;
                    }
                    break;
                case 'company_email':
                    if(isset($object->settings->email)){
                        $replace = $object->settings->email;
                    }
                    break;
                case 'company_website':
                    if(isset($object->settings->website)){
                        $replace = $object->settings->website;
                    }
                    break;
                case 'contact_person':
                    if(isset($object->settings->contact)){
                        $replace = $object->settings->contact;
                    }
                    break;
                case 'username':
                    if(isset($object->user->username)){
                        $replace = $object->user->username;
                    }
                    break;
                case 'password':
                    if(isset($object->user->password)){
                        $replace = $object->user->password;
                    }
                    break;
                case 'login_link':
                    if(isset($object->user->login_link)){
                        $replace = $object->user->login_link;
                    }
                    break;
                default:
                    $replace = '';
            }
            $body = str_replace('{' . $var . '}', $replace, $body);
        }
    }
    return $body;
}
function array_multi_subsort($array, $subkey)
{
    $b = array(); $c = array();
    foreach ($array as $k => $v) {
        $b[$k] = strtolower($v[$subkey]);
    }
    asort($b);
    foreach ($b as $key => $val) {
        $c[] = $array[$key];
    }
    return $c;
}
