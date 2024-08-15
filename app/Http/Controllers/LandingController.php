<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $rank = $request->input('rank');

        $output = shell_exec("python query.py indexpta $rank $query");

        $list_data = array_filter(explode("\n", $output));
        
        $data = array();

        foreach ($list_data as $pta) {
            $dataj = json_decode($pta, true);
            array_push($data, '
            <div>
            <div class="card mb-2">
                <div style="display: flex; flex: 1 1 auto;">
                    <div class="card-body">
                        <h5 class="card-title"><a target="_blank" href="'.$dataj['url'].'">'.$dataj['judul'].'</a></h5>
                        <div class="card-info">
                            <p>'.$dataj['penulis'].'</p>
                            <p>'.$dataj['pembimbing_1'].'</p>
                            <p>'.$dataj['pembimbing_2'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            ');
        }
        return response()->json($data);}}