<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voteModel;

class VoteController extends Controller
{
    public function upjawab($jawaban_id){
        $vote = voteModel::upjawab($jawaban_id);
        return redirect()->to('/jawaban/'.$vote->pertanyaan_id);
    }
    public function downjawab($jawaban_id){
        $vote = voteModel::downjawab($jawaban_id);
        return redirect()->to('/jawaban/'.$vote->pertanyaan_id);
    }

    public function uptanya($jawaban_id){
        $vote = voteModel::uptanya($jawaban_id);
        return redirect('/pertanyaan');
    }
    public function downtanya($jawaban_id){
        $vote = voteModel::downtanya($jawaban_id);
        return redirect('/pertanyaan');
    }
}
