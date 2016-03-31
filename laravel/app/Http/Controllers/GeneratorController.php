<?php

namespace App\Http\Controllers;

//require_once '/vendor/fzaninotto/faker/src/autoload.php';

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Badcow\LoremIpsum\Generator;
use \Faker\Factory;

class GeneratorController extends Controller
{
    public function processTextForm(Request $request)
    {
        $this->validate($request, [
            'paras' => 'required|numeric|min:1|max:99',
        ]);

        $generator = new \Badcow\LoremIpsum\Generator();

        return view('lorem-ipsum', ['paras' => $generator->getParagraphs($_POST['paras'])]);
    }

    private function randomBirthDate()
    {
        $startTime = strtotime("-90 year");
        $endTime = strtotime("-1 year");
        $rtime = mt_rand($startTime, $endTime);
        $final = date("m-d-Y", $rtime);
        return $final;
    }

    public function processUsersForm(Request $request)
    {
        $this->validate($request, [
            'users' => 'required|numeric|min:1|max:99',
        ]);

        $faker = \Faker\Factory::create();
        $users = [];
        for ($i=0; $i < $_POST['users']; $i++) {
            $tmpu = new \stdClass;
            $tmpu->name = $faker->name;
            if (isset($_POST['birthdate'])) $tmpu->birthdate = GeneratorController::randomBirthDate();
            if (isset($_POST['profile'])) $tmpu->profile =  $faker->text;
            $users[] = $tmpu;
        }

        return view('users', ['users' => $users]);
    }

    private function generatePassword($words=6, $separator='-', $number=true, $special=true)
    {
        $error = false;
        $wordList = [];
        $wordArr = [];
        $specials = ["@", "~", "$", "#", "{", "}", "|", "*", "^"];
        $final = "error";
        shuffle($specials);
        if ($_POST) {
            if (isset($_POST['words']) && is_numeric($_POST['words']) && intval($_POST['words']) > 0 && intval($_POST['words']) < 11) {
                $_POST['words'] = intval($_POST['words']);
                $words = ($_POST['words'] < 11) ? $_POST['words'] : 10;
            } else {
                $error = "The number of words must be a number within 1 and 10.";
            }
            if (!isset($_POST['number'])) {
                $number = false;
            }
            if (!isset($_POST['special'])) {
                $special = false;
            }
            if (isset($_POST['separator'])) {
                if ($_POST['separator'] == "none") {
                    $separator = "";
                } else if ($_POST['separator'] == "space") {
                    $separator = " ";
                }
            }
        }
        if (!$error) {
            $src = file_get_contents("http://www.paulnoll.com/Books/Clear-English/words-29-30-hundred.html");
            preg_match_all("'<li>(.*?)</li>'si", $src, $wordDat);
            foreach($wordDat[1] as $word){
                $wordList[] = $word;
            }
            shuffle($wordList);
            for ($i=0; $i<$words; $i++) {
                $wordArr[] = trim($wordList[$i]);
            }
            if ($number) {
                $wordArr[] = rand(0, 99);
            }
            if ($special) {
                $wordArr[] = $specials[0];
            }
            shuffle($wordArr);
            $final = implode($separator, $wordArr);
        }
        return $final;
    }

    public function showPasswordForm()
    {
        return view('passwords', ['password' => GeneratorController::generatePassword()]);
    }

    public function processPasswordForm(Request $request)
    {
        $this->validate($request, [
            'words' => 'required|numeric|min:1|max:10',
            'separator' => 'required',
        ]);

        return view('passwords', ['password' => GeneratorController::generatePassword()]);
    }
}