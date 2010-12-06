<?php
// Japanese kana typing 1.0
// For ExpressionEngine 2.0
// Copyright Nicolas Bottari
// -----------------------------------------------------
// 
// The Japanese kana typing extension for ExpressionEngine by Nicolas Bottari is licensed under a Creative Commons Attribution
// Noncommercial-Share Alike 3.0 Unported License
// http://creativecommons.org/licenses/by-nc-sa/3.0/
//
// Description
// -----------
// A small extension that writes in romaji (roman letters) in the URL title as you type Japanese kana (hiragana and katakana) or Zenkaku text in the entry title field.
//
// More info: http://nicolasbottari.com/expressionengine_cms/japanese_kana_typing/
//

class Japanese_kana_typing_ext {
	
	var $name		= 'Japanese Kana Typing';
	var $version 		= '1.0';
	var $description	= 'Adds kana/zenkaku characters-to-romaji conversion for entry title to url title.';
	var $settings_exist	= 'n';
	var $docs_url		= 'http://nicolasbottari.com/expressionengine_cms/japanese_kana_typing';

	/**
	 * Constructor
	 */
	function Japanese_kana_typing_ext($settings='')
	{
		$this->EE =& get_instance();
	}
	
	function kana_array()
	{
		$kana_array = array(
			// Japanese entities
			// Hiragana and Katakana
			'12354' => 'a',   
			'12356' => 'i',   
			'12358' => 'u',   
			'12360' => 'e',   
			'12362' => 'o',   
			
			'12450' => 'a',   
			'12452' => 'i',   
			'12454' => 'u',   
			'12456' => 'e',   
			'12458' => 'o', 
			
			'12363' => 'ka',  
			'12365' => 'ki',  
			'12367' => 'ku',  
			'12369' => 'ke',  
			'12371' => 'ko',  
			
			'12459' => 'ka',  
			'12461' => 'ki',  
			'12463' => 'ku',  
			'12465' => 'ke',  
			'12467' => 'ko', 
			
			'12364' => 'ga',  
			'12366' => 'gi',  
			'12368' => 'gu',  
			'12370' => 'ge',  
			'12372' => 'go',  
			
			'12460' => 'ga',  
			'12462' => 'gi',  
			'12464' => 'gu',  
			'12466' => 'ge',  
			'12468' => 'go', 
			
			'12373' => 'sa',  
			'12375' => 'shi', 
			'12377' => 'su',  
			'12379' => 'se',  
			'12381' => 'so',  
			
			'12469' => 'sa',  
			'12471' => 'shi', 
			'12473' => 'su',  
			'12475' => 'se',  
			'12477' => 'so',
			
			'12374' => 'za',  
			'12376' => 'ji',  
			'12378' => 'zu',  
			'12380' => 'ze',  
			'12382' => 'zo',  
			
			'12470' => 'za',  
			'12472' => 'ji',  
			'12474' => 'zu',  
			'12476' => 'ze',  
			'12478' => 'zo', 
			
			'12383' => 'ta',  
			'12385' => 'chi', 
			'12388' => 'tsu', 
			'12390' => 'te',  
			'12392' => 'to',  
			
			'12479' => 'ta',  
			'12481' => 'chi', 
			'12484' => 'tsu', 
			'12486' => 'te',  
			'12488' => 'to', 
			
			'12384' => 'da',  
			'12386' => 'ji',  
			'12389' => 'zu',  
			'12391' => 'de',  
			'12393' => 'do',  
			
			'12480' => 'da',  
			'12482' => 'ji',  
			'12485' => 'zu',  
			'12487' => 'de',  
			'12489' => 'do',
			
			'12394' => 'na',  
			'12395' => 'ni',  
			'12396' => 'nu',  
			'12397' => 'ne',  
			'12398' => 'no',  
			
			'12490' => 'na',  
			'12491' => 'ni',  
			'12492' => 'nu',  
			'12493' => 'ne',  
			'12494' => 'no', 
			
			'12399' => 'ha',  
			'12402' => 'hi',  
			'12405' => 'hu',  
			'12408' => 'he',  
			'12411' => 'ho',  
			
			'12495' => 'ha',  
			'12498' => 'hi',  
			'12501' => 'hu',  
			'12504' => 'he',  
			'12507' => 'ho',
			
			'12400' => 'ba',  
			'12403' => 'bi',  
			'12406' => 'bu',  
			'12409' => 'be',  
			'12412' => 'bo',  
			
			'12496' => 'ba',  
			'12499' => 'bi',  
			'12502' => 'bu',  
			'12505' => 'be',  
			'12508' => 'bo', 
			
			'12401' => 'pa',  
			'12404' => 'pi',  
			'12407' => 'pu',  
			'12410' => 'pe',  
			'12413' => 'po',  
			
			'12497' => 'pa',  
			'12500' => 'pi',  
			'12503' => 'pu',  
			'12506' => 'pe',  
			'12509' => 'po',
			
			'12414' => 'ma',  
			'12415' => 'mi',  
			'12416' => 'mu',  
			'12417' => 'me',  
			'12418' => 'mo',  
			
			'12510' => 'ma',  
			'12511' => 'mi',  
			'12512' => 'mu',  
			'12513' => 'me',  
			'12514' => 'mo',
			
			'12420' => 'ya',  
			
			'12422' => 'yu',  
			
			'12424' => 'yo',  
			
			'12516' => 'ya',  
			
			'12518' => 'yu',  
			
			'12520' => 'yo',
			
			'12425' => 'ra',  
			'12426' => 'ri',  
			'12427' => 'ru',  
			'12428' => 're',  
			'12429' => 'ro',  
			
			'12521' => 'ra',  
			'12522' => 'ri',  
			'12523' => 'ru',  
			'12524' => 're',  
			'12525' => 'ro',
			
			'12431' => 'wa',  
			        
			'12434' => 'wo',//o 
			
			'12527' => 'wa',  
			         
			'12530' => 'wo',//o
			
			'12435' => 'n',                                      
			
			'12531' => 'n',
			
			'12419' => 'ya',
			'12421' => 'yu',
			'12423' => 'yo',
			'12515' => 'ya',
			'12517' => 'yu',
			'12519' => 'yo',
			'12387' => 'tsu',
			'12483' => 'tsu',
			
			//
			// Since so many people have trouble typing letters in hankaku
			// This will convert zenkaku numbers and alphabet into hankaku
			//
			// Learning to type on a computer could also work.
			//
			
			'65297' => "1",
			'65298' => "2",
			'65299' => "3",
			'65300' => "4",
			'65301' => "5",
			'65302' => "6",
			'65303' => "7",
			'65304' => "8",
			'65305' => "9",
			'65296' => "0",

			'65345' => 'a',
			'65346' => 'b',
			'65347' => 'c',
			'65348' => 'd',
			'65349' => 'e',
			'65350' => 'f',
			'65351' => 'g',
			'65352' => 'h',
			'65353' => 'i',
			'65354' => 'j',
			'65355' => 'k',
			'65356' => 'l',
			'65357' => 'm',
			'65358' => 'n',
			'65359' => 'o',
			'65360' => 'p',
			'65361' => 'q',
			'65362' => 'r',
			'65363' => 's',
			'65364' => 't',
			'65365' => 'u',
			'65366' => 'v',
			'65367' => 'w',
			'65368' => 'x',
			'65369' => 'y',
			'65370' => 'z',
			
			'65313' => 'A',
			'65314' => 'B',
			'65315' => 'C',
			'65316' => 'D',
			'65317' => 'E',
			'65318' => 'F',
			'65319' => 'G',
			'65320' => 'H',
			'65321' => 'I',
			'65322' => 'J',
			'65323' => 'K',
			'65324' => 'L',
			'65325' => 'M',
			'65326' => 'N',
			'65327' => 'O',
			'65328' => 'P',
			'65329' => 'Q',
			'65330' => 'R',
			'65331' => 'S',
			'65332' => 'T',
			'65333' => 'U',
			'65334' => 'V',
			'65335' => 'W',
			'65336' => 'X',
			'65337' => 'Y',
			'65338' => 'Z',
			'12288' => '_', // That darn double-byte space
			'12289' => '_', // That darn double-byte comma		
		);
		
		return $kana_array;
	}


	function activate_extension() {
	
	      $data = array(
	        'class'      => __CLASS__,
	        'method'    => "kana_array",
	        'hook'      => "foreign_character_conversion_array",
	        'settings'    => '',
	        'priority'    => 10,
	        'version'    => $this->version,
	        'enabled'    => "y"
	      );
	
	      // insert in database
	      $this->EE->db->insert('exp_extensions', $data);
	  }
	
	
	  function disable_extension() {
	
	      $this->EE->db->where('class', __CLASS__);
	      $this->EE->db->delete('exp_extensions');
	  } 
	  
	  /**
	 * Update Extension
	 *
	 * This function performs any necessary db updates when the extension
	 * page is visited
	 *
	 * @return 	mixed	void on update / false if none
	 */
	function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}
		
		if ($current < $this->version)
		{
			// Update to version 1.0
		}
		
		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->update(
					'extensions', 
					array('version' => $this->version)
		);
	}

  
  

}
// END CLASS

