<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function getData(Request $request)
    {
        $objHods = User::getInstance();
        $extraSearch = '1=1';

        $length = $request->input('length');
        $offset = $request->input('start');
        $searchValue = $request->input('search')['value'];
        $column = $request->input('order')[0]['column'];
        $direction = $request->input('order')[0]['dir'];

        if($length == -1) {
            $length = $objHods->fetchUserListCount('', $extraSearch);

        }

        switch ($column) {
            case 0:
                $column = 'id';
                break;
            case 1:
                $column = 'name';
                break;
            case 2:
                $column = 'email';
                break;
            default:
                $column = 'id';
                break;
        }


        $result = $objHods->manageUsersListByLimit($offset, $length, $column, $direction, $searchValue, $extraSearch);
        if ($result) {

            foreach ($result as $value) {
                $value = (array)$value;
                $action = '<a href="#" class="btn btn-success btn-sm" style="padding: 3px 6px;"><i class="fa fa-eye"></i></a>';


                $records["data"][] = array(
                    $value['id'],
                    $value['name'],
                    $value['email'],
                    $action
                );

            }
            $records["recordsTotal"] = $objHods->fetchUserListCount('', $extraSearch);
            $records["recordsFiltered"] = $objHods->fetchUserListCount($searchValue, $extraSearch);

            echo json_encode($records);
        }
    }
}
