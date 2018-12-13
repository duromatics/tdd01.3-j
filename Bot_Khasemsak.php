<?php
	require('TDD01.3-J.php');
	function send_back($txtin,$replyToken)
	{
		$access_token = '2HGhmCyQ9usib5/iCsstrgFuzOQrzk1bioHQDj67T7rZ6jzvgTywHOJGBLFkyXYlaHT84VSrtbZ3kyfr+qs79n/9j/4QlqZgLg3dVZm+xD/q30qzUL+uJsJTrk3JUbNtO/OGP0NBogD81KXGvDFgPAdB04t89/1O/w1cDnyilFU=';
		$messages = ['type' => 'text','text' => $txtin];
		$url = 'https://api.line.me/v2/bot/message/reply';
		$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
		$post = json_encode($data);
		$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
	}
			$content = file_get_contents('php://input');
			$events = json_decode($content, true);
			if (!is_null($events['events']))
			{
				foreach ($events['events'] as $event)
				{
					if($event['type'] == 'message' && $event['message']['type'] == 'text')
					{
						$replyToken = $event['replyToken'];
						$txtin = $event['message']['text'];
						$result = search($txtin);
						send_back($result,$replyToken);
					}
				}
			}		
?>