<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model {
    use HasFactory;
    protected $table = 'companies';
    public function search($input,$result)
    {
        $empty = empty($result);
        if ($empty) {
            return $data = self::where('companies_id','LIKE',"%{$input}%")->paginate(15);
        }
        if (in_array('searchCompaniesId',$result)&&!$empty) {
            $data = self::where('companies_id','LIKE',"%{$input}%");
        }else{
            $data = self::where('companies_id','LIKE',"%{$input}%");
        }

        if (in_array('searchCompaniesName',$result)&&!$empty) {
            $data->orwhere('company_name' , 'LIKE' , "%{$input}%");
        }else{
            $data = self::where('company_name','LIKE',"%{$input}%");
        }

        if (in_array('searchCompaniesCode',$result)&&!$empty) {
            $data->orwhere('company_code' , 'LIKE' , "%{$input}%");
        }else{
            $data = self::where('company_code','LIKE',"%{$input}%");
        }
        
        if (in_array('searchCompaniesWeb',$result)&&!$empty) {
            $data->orwhere('company_web' , 'LIKE' , "%{$input}%");
        }else{
            $data = self::where('company_web','LIKE',"%{$input}%");
        }

        if (in_array('searchCompaniesAddress',$result)&&!$empty) {
            $data->orwhere('company_address' , 'LIKE' , "%{$input}%");
        }
        else{
            $data = self::where('company_address','LIKE',"%{$input}%");
        }

        if (in_array('searchCompaniesPhone',$result)&&!$empty) {
            $data->orwhere('company_phone' , 'LIKE' , "%{$input}%");
        }else{
            $data = self::where('company_phone','LIKE',"%{$input}%");
        }
        
        return $data->paginate(15);
    }
}
