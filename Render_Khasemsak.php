<?php

function flex_msg($keyword)
{
	$server = "us-cdbr-iron-east-01.cleardb.net";
	$username = "b798786b8aa714";
	$password = "2e0e0451";
	$db = "heroku_ce52199dd4f50e1";
	$conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	$sql_key_search = "SELECT * FROM tbl_khasemsak_tdd_job WHERE PEA LIKE '%".$keyword."%'";
	$key_query = mysqli_query($conn,$sql_key_search);
    $numrows = mysqli_num_rows($key_query);
	$objsearch = mysqli_fetch_array($key_query);
	/*if($numrows > 1)
	{
		$url = "https://tdd013j.herokuapp.com/Result_Khasemsak.php?keyword=".$keyword;
		$txtresult = $numrows." items";
		$btn_txt = "Click";
	}
		else if ($numrows < 1)
		{
			$url = "https://drive.google.com/file/d/1Yihe0MMRmKQnEBPY3U2gxizdMHLkSqYb/preview";
			$txtresult = "0 item";
			$btn_txt = "Manual";
		}*/
		$url = "https://tdd013j.herokuapp.com/Result_Khasemsak.php?keyword=".$keyword;
		$txtresult = $numrows." items";
		$btn_txt = "Click";
	$json1 = '{
				"type":"flex",
				"altText":" TDD01.3-J(PEAS1)",
				"contents":{
  "type": "bubble",
  "hero": {
    "type": "image",
    "url": "https://pqlibrary.herokuapp.com/IMG1360550178.png",
    "size": "full",
    "aspectRatio": "16:9",
    "aspectMode": "fit",
    "action": {
      "type": "uri",
      "uri": "http://linecorp.com/"
    }
  },
  "body": {
    "type": "box",
    "layout": "vertical",
    "contents": [
      {
        "type": "text",
        "text": "All Results",
        "weight": "bold",
        "size": "xl"
      },
      {
        "type": "box",
        "layout": "vertical",
        "margin": "lg",
        "spacing": "sm",
        "contents": [
          {
            "type": "box",
            "layout": "baseline",
            "spacing": "sm",
            "contents": [
              {
                "type": "text",
                "text": "'.$txtresult.'",
                "wrap": true,
                "color": "#666666",
                "size": "md",
                "flex": 5
              }
            ]
          }
        ]
      }
    ]
  },
  "footer": {
    "type": "box",
    "layout": "vertical",
    "spacing": "sm",
    "contents": [
      {
        "type": "button",
        "style": "primary",
        "height": "sm",
        "action": {
          "type": "uri",
          "label": "'.$btn_txt.'",
          "uri": "'.$url.'"
        }
      },
     
      {
        "type": "spacer",
        "size": "sm"
      }
    ],
    "flex": 0
  }
},
	"quickReply": {
             "items": [
                {
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "กกค.(ต.1)",
                    "text": "#กกค.(ต.1)"
                   }
                } ,
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ชพ.",
                    "text": "#ชพ"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "รบ.",
                    "text": "#รบ"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ลส.",
                    "text": "#ลส."
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ขยย.",
                    "text": "#ขยย"
                   }
                } ,
				{
				 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "จบง.",
                    "text": "#จบง"
                   }
                } ,
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "บสพ.",
                    "text": "#บสพ"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ปข.",
                    "text": "#ปข"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "พธร.",
                    "text": "#พธร"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "สวี",
                    "text": "#สวี"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ชอ.",
                    "text": "#ชอ"
                   }
				},
				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "ปบ.",
                    "text": "#ปบ"
                   }
				},
 				{
                 "type": "action",
                 "action": {
                    "type": "message",
                    "label": "หห.",
                    "text": "#หห"
                   }
                } 			
               ]
            }
	}';
	$result = json_decode($json1);
	return $result;
}
?>