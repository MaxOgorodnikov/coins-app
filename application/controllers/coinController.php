<?php
	header('Content-Type: application/json');
	
	class coinController {
		protected $post;
		
		function __construct(){
			foreach($_POST as $key=>$value){
				$this->post[$key] = $value;
			}
			
			try {
				$amount = $this->getPencesAmount($this->getPostVar('userInput'));
				$result = $this->getCoins($amount);
				
				echo json_encode(array(
					'result' => htmlentities($this->getPostVar('userInput')) . ' = ' . utf8_encode($result)
				));
			} catch (Exception $e) {
				$this->jsonError($e->getMessage(), $e->getCode());
			}
		}
		
		
		public function getPostVar($key){
			if (isset($this->post[$key])) {
				return $this->post[$key];
			} else {
				throw new Exception('Amount not set');
			}
		}
		
		private function getCoins($amount) {
			$coins = array('&pound;2'=>200, '&pound;1'=>100, '50p'=>50, '20p'=>20, '2p'=>2, '1p'=>1);
			$result = '';
			
			while ($amount > 0) {
				$coin = current($coins);
				$k = floor($amount / $coin);
				$amount %= $coin;
				if ($k >0) {
					$result .= $k . ' x ' . key($coins);
					if ($amount > 0) {
						$result .= ', ';
					}
				}
				next($coins);
			}
			
			return $result;
		}
		
		private function getPencesAmount($value) {
			preg_match('/(?<pound_sign>£)?(?<first>\d+)(?<dot_sign>[\.|\,])?(?<second>\d+)?(?<pence_sign>p)?/', $value, $matches);
			
			if (!empty($matches['pound_sign']) || !empty($matches['dot_sign'])) {
				if (!isset($matches['second'])) $matches['second'] = '0';
				$amount = round($matches['first'].'.'.$matches['second'], 2)*100;
			} else if (empty($matches['pound_sign']) && empty($matches['dot_sign'])) {
				$amount = round($matches['first'], 2);
			}
			
			return $amount;
		}
		
		public function jsonError($errorMessage, $errorCode){
			echo json_encode(array(
				'error' => array(
					'msg' => $errorMessage,
					'code' => $errorCode,
				),
			));
		}
	}
	
	$coin = new coinController();
?>