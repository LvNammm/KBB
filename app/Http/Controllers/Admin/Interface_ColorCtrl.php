<?php

namespace App\Http\Controllers\Admin;

use App\Models\Interface_color;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Interface_ColorCtrl extends Authentication
{
    public function index(Request $request)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $opacity = array();
        $color = array();
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        // $rbga = explode(",",substr($interfaceColor->hd_cl_background,1,-1));
        array_push($opacity,
            explode(",",substr($interfaceColor->hd_cl_background,1,-1))[3],
            explode(",",substr($interfaceColor->hd_cl_text_category,1,-1))[3],
            explode(",",substr($interfaceColor->hd_cl_text_contact,1,-1))[3],
            explode(",",substr($interfaceColor->hd_cl_text_contact_content,1,-1))[3],
            explode(",",substr($interfaceColor->bd_cl_background_category,1,-1))[3],
            explode(",",substr($interfaceColor->bd_cl_text_category,1,-1))[3],
            explode(",",substr($interfaceColor->ft_cl_background,1,-1))[3],
            explode(",",substr($interfaceColor->ft_cl_text,1,-1))[3]);
        $interfaceColor->hd_cl_background = $this->Rgba2Hex($interfaceColor->hd_cl_background);
        $interfaceColor->hd_cl_text_category = $this->Rgba2Hex($interfaceColor->hd_cl_text_category);
        $interfaceColor->hd_cl_text_contact = $this->Rgba2Hex($interfaceColor->hd_cl_text_contact);
        $interfaceColor->hd_cl_text_contact_content = $this->Rgba2Hex($interfaceColor->hd_cl_text_contact_content);
        $interfaceColor->bd_cl_background_category = $this->Rgba2Hex($interfaceColor->bd_cl_background_category);
        $interfaceColor->bd_cl_text_category = $this->Rgba2Hex($interfaceColor->bd_cl_text_category);
        $interfaceColor->ft_cl_background = $this->Rgba2Hex($interfaceColor->ft_cl_background);
        $interfaceColor->ft_cl_text = $this->Rgba2Hex($interfaceColor->ft_cl_text);
        array_push($color,
                    $interfaceColor->hd_cl_background,
                    $interfaceColor->hd_cl_text_category,
                    $interfaceColor->hd_cl_text_contact,
                    $interfaceColor->hd_cl_text_contact_content,
                    $interfaceColor->bd_cl_background_category,
                    $interfaceColor->bd_cl_text_category,
                    $interfaceColor->ft_cl_background,
                    $interfaceColor->ft_cl_text
        );
        // print_r($color);
        return view("admin.interface_color", ["interfaceColor" => $interfaceColor,"opacity"=>$opacity,"color"=>$color]);
    }

    public function changeColor(Request $request)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $hexColor = substr($request->hd_cl_background, 1, 6);
        $rgb = str_split($hexColor, 2);
        $rgb[0] = hexdec($rgb[0]);
        $rgb[1] = hexdec($rgb[1]);
        $rgb[2] = hexdec($rgb[2]);

        $interfaceColor = new Interface_color();

        //header
        $rgb = $this->converColorToRgb($request->hd_cl_background);
        $interfaceColor->hd_cl_background = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_hd_cl_background . ")";

        $rgb = $this->converColorToRgb($request->hd_cl_text_category);
        $interfaceColor->hd_cl_text_category = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_hd_cl_text_category . ")";

        $rgb = $this->converColorToRgb($request->hd_cl_text_contact);
        $interfaceColor->hd_cl_text_contact = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_hd_cl_text_contact . ")";

        $rgb = $this->converColorToRgb($request->hd_cl_text_contact_content);
        $interfaceColor->hd_cl_text_contact_content = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_hd_cl_text_contact_content . ")";

        //body
        $rgb = $this->converColorToRgb($request->bd_cl_background_category);
        $interfaceColor->bd_cl_background_category = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_bd_cl_background_category . ")";

        $rgb = $this->converColorToRgb($request->bd_cl_text_category);
        $interfaceColor->bd_cl_text_category = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_bd_cl_text_category . ")";

        //footer
        $rgb = $this->converColorToRgb($request->ft_cl_background);
        $interfaceColor->ft_cl_background = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_ft_cl_background . ")";

        $rgb = $this->converColorToRgb($request->ft_cl_text);
        $interfaceColor->ft_cl_text = "rgb(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . "," . $request->opacity_ft_cl_text . ")";

        $interfaceColor->create_by = $request->session()->get("user-login");
        $interfaceColor->save();
        var_dump($interfaceColor);
    }

    private function converColorToRgb($color)
    {
        $hexColor = substr($color, 1, 6);
        $rgb = str_split($hexColor, 2);
        $rgb[0] = hexdec($rgb[0]);
        $rgb[1] = hexdec($rgb[1]);
        $rgb[2] = hexdec($rgb[2]);
        return $rgb;
    }

    private function Rgba2Hex($string)
    {
        $rgba  = array();
        $hex   = '';
        $regex = '#\((([^()]+|(?R))*)\)#';
        if (preg_match_all($regex, $string, $matches)) {
            $rgba = explode(',', implode(' ', $matches[1]));
        } else {
            $rgba = explode(',', $string);
        }

        $rr = dechex($rgba['0']);
        $rr = strlen($rr)==1?'0'.$rr:$rr;
        $gg = dechex($rgba['1']);
        $gg = strlen($gg)==1?'0'.$gg:$gg;
        $bb = dechex($rgba['2']);
        $bb = strlen($bb)==1?'0'.$bb:$bb;

        return strtoupper("#$rr$gg$bb");
    }
}
