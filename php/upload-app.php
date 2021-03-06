<?php
 require_once("db-connect.php");
 class uploadApp extends Conn{
 	private static $conn;
	public static function setConnect(){
		self::$conn = self::connect();
	} 
	public static function uploadProject($file,$post){
			$siteimgaes = self::uploadImages($file['site']);
			$floorimgaes = self::uploadImages($file['floor']);
			$elevimgaes = self::uploadImages($file['elevation']);
			$secimgaes = self::uploadImages($file['section']);
			$view3d = self::uploadImages($file['view3d']);
			$proj_name = self::$conn->real_escape_string($post['proj_name']);
			$loc = self::$conn->real_escape_string($post['loc']);
			$ins_name = self::$conn->real_escape_string($post['ins_name']);
			$area = self::$conn->real_escape_string($post['area']);
			$proj_year = self::$conn->real_escape_string($post['proj_year']);
			$proj_type = self::$conn->real_escape_string($post['proj_type']);
			$proj_site_img_desc = self::$conn->real_escape_string($post['proj_site_img_desc']);
			$proj_floor_img_desc = self::$conn->real_escape_string($post['proj_floor_img_desc']);
			$proj_elev_img_desc = self::$conn->real_escape_string($post['proj_elev_img_desc']);
			$proj_sec_img_desc = self::$conn->real_escape_string($post['proj_sec_img_desc']);
			$proj_desc = self::$conn->real_escape_string($post['proj_desc']);
			$id = $post['userId'];
			$sql = "INSERT INTO projects(project_name,location,institute,area,project_year,project_type,site_image,site_image_desc,floor_image,floor_image_desc,elevation_image,elevation_image_desc,section_image,section_image_desc,view3d_img,project_desc,project_date,project_time,user_id) VALUES('$proj_name','$loc','$ins_name','$area','$proj_year','$proj_type','$siteimgaes','$proj_site_img_desc','$floorimgaes','$proj_floor_img_desc','$elevimgaes','$proj_elev_img_desc','$secimgaes','$proj_sec_img_desc','$view3d','$proj_desc',NOW(),NOW(),$id)";
			if(self::$conn->query($sql)){
				$resp['status'] = "yes";
				$resp['message'] = "Thanks For Uploading";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "Oops! Not Uploaded ";
				echo json_encode(self::$conn->error." ".$sql);
			}
			echo json_encode($resp);
	}
	/*upload project images */
	public static function uploadImages($file){
		/* Location */
		$location = '../uploads/';

		// Count total files
		$countfiles = count($file['name']);
		// echo json_encode($file['section']);
		$filename_arr = array(); 
		// Looping all files
		for ( $i = 0;$i < $countfiles;$i++ ){
		     $filename = str_replace(" ","_",$file['name'][$i]);
		    // Upload file    
		    move_uploaded_file($file['tmp_name'][$i],$location.$filename);      
		    $file_arr[] = $filename;
		}
		return implode(",",$file_arr);
	}
	public static function uploadFeedback($post){
		# echo json_encode($post);
		$star = $post['star'];
		$feedback = self::$conn->real_escape_string($post['feedback']);
		$id = $post['id'];
		$sql = "INSERT INTO project_upload_feedback(stars,feedback,user_id) VALUES('$star','$feedback',$id)";
		if(self::$conn->query($sql)){
			echo json_encode("feedback query run succesfully");
		}
		else{
			echo json_encode("feedback query error");
		}
	}
	public static function uploadPortfolio($file,$post){
		if(self::upload_file($file['portfolioFile'])){
			 $pname = self::$conn->real_escape_string($post['portfolio_name']);
			 $pplace = self::$conn->real_escape_string($post['portfolio_place']);
			 $pcollege = self::$conn->real_escape_string($post['portfolio_college']);
			 $pyear = self::$conn->real_escape_string($post['portfolio_year']);
			 $myfile = str_replace(" ","_", $file['portfolioFile']['name']);
			 $pfile = self::$conn->real_escape_string($myfile);
			 $id = $post['userid'];
			 $sql = "INSERT INTO portfolio(portfolio_name,portfolio_place,portfolio_college,portfolio_year,portfolio_file,portfolio_date,portfolio_time,user_id) VALUES('$pname','$pplace','$pcollege','$pyear','$pfile',NOW(),NOW(),$id)";
			 if(self::$conn->query($sql)){
			 	$resp['status'] = "yes";
			 }
			 else{
			 	$resp['status'] = "no";
			 }
		 	echo json_encode($resp);
		}
		else{
			echo json_encode("not uploaded portfolio");
		}
	}
	public static function uploadDessertation($file,$post){
		#echo json_encode($file['dissertation_file']);
		if(self::upload_file($file['dissertation_file'])){
			 $dname = self::$conn->real_escape_string($post['dissertation_name']);
			 $dplace = self::$conn->real_escape_string($post['dissertation_place']);
			 $dcollege = self::$conn->real_escape_string($post['dissertation_college']);
			 $dyear = self::$conn->real_escape_string($post['dissertation_year']);
			 $myfile = str_replace(" ", "_", $file['dissertation_file']['name']);
			 $dfile = self::$conn->real_escape_string($myfile);
			 $id = $post['userid'];
			 $sql = "INSERT INTO dessertation(dessertation_name,dessertation_place,dessertation_college,dessertation_year,dessertation_file,dessertation_date,dessertation_time,user_id) VALUES('$dname','$dplace','$dcollege','$dyear','$dfile',NOW(),NOW(),$id)";
			 if(self::$conn->query($sql)){
			 	$resp['status'] = "yes";
			 }
			 else{
			 	$resp['status'] = "no";
			 }
		 	echo json_encode($resp);
		}
		else{
			echo json_encode("not uploaded portfolio");
		}
	} 
	public static function uploadThesisReport($file,$post){
		if(self::upload_file($file['thesis_report_file'])){
			$trname = self::$conn->real_escape_string($post['thesis_report_name']);
			 $trplace = self::$conn->real_escape_string($post['thesis_report_place']);
			 $trcollege = self::$conn->real_escape_string($post['thesis_report_college']);
			 $tryear = self::$conn->real_escape_string($post['thesis_report_year']);
			 $myfile = str_replace(" ", "_", $file['thesis_report_file']['name']);
			 $trfile = self::$conn->real_escape_string($myfile);
			 $id = $post['userid'];
			 $sql = "INSERT INTO thesis_report(thesis_report_name,thesis_report_place,thesis_report_college,thesis_report_year,thesis_report_file,thesis_report_date,thesis_report_time,user_id) VALUES('$trname','$trplace','$trcollege','$tryear','$trfile',NOW(),NOW(),$id)";
			 if(self::$conn->query($sql)){
			 	$resp['status'] = "yes";
			 }
			 else{
			 	$resp['status'] = "no";
			 }
		 	echo json_encode($resp);
		}
		else{
			echo json_encode("not uploaded thesis report");
		}
	}
	
	public static function uploadBLog($file,$post){
		$blog_heading = self::$conn->real_escape_string($post['blog_heading']);
		$blog_category = self::$conn->real_escape_string($post['blog_category']);
		$myBlog = self::$conn->real_escape_string($post['myBlog']);
		$id = $post['id'];
		if(self::upload_file($file)){
			$name = $file['name'];
			$sql = "INSERT INTO blog(heading,category,blog_file,html_content,blog_date,blog_time,user_id) VALUES('$blog_heading','$blog_category','$name','$myBlog',NOW(),NOW(),$id)";
			if(self::$conn->query($sql)){
				$resp['status'] = "yes";
				$resp['message']  = "succesfully run";
			}
			else{
				$resp['status'] = "no";
				$resp['message']  = "error";
			}
			echo json_encode($resp);
		}
		else{
			echo json_encode("not upload blog file");
		}
	}
	public static function uploadThesis($post,$file){
		$casestudy = self::uploadImages($file['casestudy']);
		$conceptsheet = self::uploadImages($file['conceptsheet']);
		$siteplan = self::uploadImages($file['siteplan']);
		$plan = self::uploadImages($file['plan']);
		$elevation = self::uploadImages($file['elevation']);
		$thesis_name = self::$conn->real_escape_string($post['thesis_name']);
		$thesis_title = self::$conn->real_escape_string($post['thesis_title']);
		$thesis_location = self::$conn->real_escape_string($post['thesis_location']);
		$thesis_area = self::$conn->real_escape_string($post['thesis_area']);
		$thesis_year = self::$conn->real_escape_string($post['thesis_year']);
		$thesis_ins = self::$conn->real_escape_string($post['thesis_ins']);
		$thesis_guide = self::$conn->real_escape_string($post['thesis_guide']);
		$thesis_proj_type = self::$conn->real_escape_string($post['thesis_proj_type']);
		$id = self::$conn->real_escape_string($post['id']);
		$sql = "INSERT INTO thesis(thesis_name,thesis_title,thesis_location,thesis_area,thesis_year,thesis_ins,thesis_guide,thesis_proj_type,thesis_date,casestudy,conceptsheet,siteplan,plan,elevation,user_id) VALUES('$thesis_name','$thesis_title','$thesis_location','$thesis_area','$thesis_year','$thesis_ins','$thesis_guide','$thesis_proj_type',NOW(),'$casestudy','$conceptsheet','$siteplan','$plan','$elevation',$id)";
		if(self::$conn->query($sql)){
			$resp['message'] = "succefully submitted your data";
			$resp['status'] = "yes";
		}
		else{
			$resp['message'] = "something going wrong";
			$resp['status'] = "no";
		}
		echo json_encode($resp);
	}
	public static function uploadEvents($post,$file){
		$event_name = self::$conn->real_escape_string($post['event_name']);
		$event_category = self::$conn->real_escape_string($post['event_category']);
		$eventor_name = self::$conn->real_escape_string($post['eventor_name']);
		$event_content = self::$conn->real_escape_string($post['event_content']);
		if(self::upload_file($file)){
			$event_file = $file['name'];
			$sql = "INSERT INTO events(event_name,event_category,eventor_name,event_file,event_content,event_date) VALUES('$event_name','$event_category','$eventor_name','$event_file','$event_content',NOW())";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
				$resp['message'] = "succefully Submit";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "query error";
			}
			echo json_encode($resp);
		}
	}
	public static function upload_file($file){
		$location = "../upload-file/";
		$filename = str_replace(" ", "_", $file['name']);
		return move_uploaded_file($file['tmp_name'],$location.$filename);
	}
	public static function uploadJob($post,$file){
		$job_heading = self::$conn->real_escape_string($post['job_heading']);
		$job_category = self::$conn->real_escape_string($post['job_category']);
		$job_provider_name = self::$conn->real_escape_string($post['job_provider_name']);
		$job_content = self::$conn->real_escape_string($post['job_content']);
		if(self::upload_file($file)){
			$job_file = $file['name'];
			$sql = "INSERT INTO jobs(job_heading,job_category,job_provider_name,job_content,job_file,job_date) VALUES('$job_heading','$job_category','$job_provider_name','$job_content','$job_file',NOW())";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
				$resp['message'] = "Data has been submitted";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "Error";
			}
			echo json_encode($resp);
		}
	}
	public static function uploadCompetition($post,$file){
		$competition_heading = self::$conn->real_escape_string($post['competition_heading']);
		$competition_category = self::$conn->real_escape_string($post['competition_category']);
		$competitor_name = self::$conn->real_escape_string($post['competitor_name']);
		$competitor_content = self::$conn->real_escape_string($post['competitor_content']);
		if(self::upload_file($file)){
			$competitor_file = self::$conn->real_escape_string($file['name']);
			$sql = "INSERT INTO competition(competition_heading,competition_category,competitor_name,competitor_content,competitor_file,competitor_date) VALUES('$competition_heading','$competition_category','$competitor_name','$competitor_content','$competitor_file',NOW())";
			if(self::$conn->query($sql)){
				$resp['status'] = "ok";
				$resp['message'] = "succesfully submit";
			}
			else{
				$resp['status'] = "no";
				$resp['message'] = "run failed";
			}
			echo json_encode($resp);
		}
	}
	public static function uploadPartner($post){
		$name = $post['name'];
		$company_name = $post['company_name'];
		$website = $post['website'];
		$type = $post['type'];
		$email = $post['email'];
		$password = $post['password'];
		$sql = "INSERT INTO users(name,company_name,website,profession,email,password) VALUES('$name','$company_name','$website','$type','$email','$password')";
		if(self::$conn->query($sql)){
			$sql1 = "SELECT user_id,profession,profile,company_name,name FROM users WHERE email='$email'";
			if($res=self::$conn->query($sql1)){
				if($res->num_rows>0){
					while($row=$res->fetch_assoc()){
						$resp['data'] = $row;
						$resp['status'] = "ok";
						$resp['message'] = "succesfully run";
					}
				}
			}
		}
		else{
			$resp['status'] = "no";
			$resp['message'] = self::$conn->error;
			$resp['data'] = "not found";
		}
		echo json_encode($resp);
	}
 }
 uploadApp::setConnect();
?>