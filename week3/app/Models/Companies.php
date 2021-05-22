<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';
    public function search($input, $result, $category)
    {
        $arrayCheckBox = [
            'companiesId' => 'searchCompaniesId',
            'companiesName' => 'searchCompaniesName',
            'companiesCode' => 'searchCompaniesCode',
            'companiesWeb' => 'searchCompaniesWeb',
            'companiesAddress' => 'searchCompaniesAddress',
            'companiesPhone' => 'searchCompaniesPhone'
        ];

        $empty = empty($result);

        if ($empty) {
            $data = self::where('category_id', '=', $category[0]);
            return $data->where('companies_id', 'LIKE', "%{$input}%")->paginate(15);
        }

        $data = self::where('category_id', '=', $category[0]);

        switch ($result[0]) {
            case $arrayCheckBox['companiesId']:
                $data->where('companies_id', 'LIKE', "%{$input}%");
                break;
            case $arrayCheckBox['companiesName']:
                $data->where('company_name', 'LIKE', "%{$input}%");
                break;
            case $arrayCheckBox['companiesCode']:
                $data->where('company_code', 'LIKE', "%{$input}%");
                break;
            case $arrayCheckBox['companiesWeb']:
                $data->where('company_web', 'LIKE', "%{$input}%");
                break;
            case $arrayCheckBox['companiesAddress']:
                $data->where('company_address', 'LIKE', "%{$input}%");
                break;
            case $arrayCheckBox['companiesPhone']:
                $data->where('company_phone', 'LIKE', "%{$input}%");
                break;
        }

        for ($i = 0; $i < count($result); $i++) {
            switch ($result[$i]) {
                case $arrayCheckBox['companiesId']:
                    $data->orwhere('companies_id', 'LIKE', "%{$input}%");
                    break;
                case $arrayCheckBox['companiesName']:
                    $data->orwhere('company_name', 'LIKE', "%{$input}%");
                    break;
                case $arrayCheckBox['companiesCode']:
                    $data->orwhere('company_code', 'LIKE', "%{$input}%");
                    break;
                case $arrayCheckBox['companiesWeb']:
                    $data->orwhere('company_web', 'LIKE', "%{$input}%");
                    break;
                case $arrayCheckBox['companiesAddress']:
                    $data->orwhere('company_address', 'LIKE', "%{$input}%");
                    break;
                case $arrayCheckBox['companiesPhone']:
                    $data->orwhere('company_phone', 'LIKE', "%{$input}%");
                    break;
            }
        }

        return $data->paginate(15);
    }
}
