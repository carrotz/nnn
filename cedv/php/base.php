<?php	
    class my_date{
		public $year;
		public $month;	
		public $day;

	}
	
	class morbidity{//发病信息
		public $icd_o_3;
		public $icd_10;
		public $age;
		public $sex;
		public $birth;
		public $incidence;	
	}
	
	class tumor{//肿瘤信息
		public $icd_o_3;
		public $icd_10;
		public $cname;
		public $ename;
		public $mesh;
		public $cmesh;	
		public $entry;
		public $anno;
		public $introduce;
	}

?>