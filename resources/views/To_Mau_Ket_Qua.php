<?php 
				function stripUnicode($str){
					$ThaiThe = $str;
					if(!$ThaiThe) return null;
						$unicode = array(
						'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
						'd'=>'đ',
						'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
						'i'=>'í|ì|ỉ|ĩ|ị',
						'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
						'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
						'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
					);
					foreach($unicode as $nonUnicode=>$uni) $ThaiThe = preg_replace("/($uni)/i", $nonUnicode, $ThaiThe);
					return $ThaiThe;
				}

				function utf8_substr_replace($original, $replacement, $position, $length)
				{
				    $startString = mb_substr($original, 0, $position, "UTF-8");
				    $endString = mb_substr($original, $position + $length, mb_strlen($original), "UTF-8");

				    $out = $startString . $replacement . $endString;

				    return $out;
				}

				function Doi_Mau($str, $TuKhoa)
				{
					$TK = "";
					$Chuoi = "";

					$TK = stripUnicode($TuKhoa);

					$Chuoi = stripUnicode($str);

					$index = stripos($Chuoi, $TK);

					if ($index || strtolower($Chuoi[0]) == strtolower($TK[0])){
						$length = strlen($TK);

						$Chuoi = utf8_substr_replace($str, $TK, $index , $length);

						$sub1 = mb_substr($str, $index, $length, "UTF-8");

						$KQ = str_replace($TK ,"<span class='bg-danger'>$sub1</span>", $Chuoi);
						return $KQ;
					}
					else
						return $str;
				}
			?>