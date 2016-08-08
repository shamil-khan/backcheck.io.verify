<?php
$uID = $_SESSION['user_id'];


if(isset($_REQUEST['filter_mis_rec'])){
$where = "";

if(isset($_REQUEST['search_ianame']) && $_REQUEST['search_ianame']!="" && $_REQUEST['search_ianame']!="-"){
$search_ianame  = $_REQUEST['search_ianame'];
$where = ($where!="")?" $where AND ianame='$search_ianame'":" AND ianame='$search_ianame' ";
}

if(isset($_REQUEST['search_chk_source']) && $_REQUEST['search_chk_source']!="" && $_REQUEST['search_chk_source']!="-" ){
$search_chk_source  = $_REQUEST['search_chk_source'];
$where = ($where!="")?" $where AND checkSource = '$search_chk_source'":" AND checkSource='$search_chk_source' ";
}

if(isset($_REQUEST['from_date']) && $_REQUEST['to_date']!="" ){
 
$from_date = date('Y-m-d H:i:s' ,strtotime($_REQUEST['from_date']));
$to_date =  date('Y-m-d H:i:s' ,strtotime($_REQUEST['to_date']));

  
 $where = ($where!="")?" $where AND  DATE(dd_cdate) BETWEEN DATE('".$from_date."') AND DATE('".$to_date."')":"  DATE(dd_cdate) BETWEEN DATE('".$from_date."') AND DATE('".$to_date."')";

}
}


?>

<style>
	.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all{z-index: 1061 !important;
}

</style>

<script>
 $(document).ready(function () {
    $('#tableSortable222').dataTable({
        "order": [[2, 'desc']],
		"iDisplayLength": 100
		});
		
        }); 
	function deleteRec(misID){
		if(confirm("Are you sure want to delete this record?")){
			$.ajax({
				type: 'POST',
				url: "actions.php",
				data: "ePage=add_rating&misdel=1&misID="+misID,
				success: function(response){
			if(response == 'deleted')
			{
				$("#row_"+misID).css('background-color','#ff0000').slideUp('slow').delay(1000).remove();
				$.jGrowl('Record deleted successfull.', {
					header: 'Success!',
					theme: 'bg-success'
					});				
			}
			else
			{
				
				$.jGrowl('Error in deletion.', {
					header: 'Error!',
					theme: 'bg-danger'
					});	
			}
				 
					}

		});
		}
	}


function mainfunction(addoredit,id)
	{
		  var formData = $('#reference_letter_form').serialize();
 
	if()
	 if(id != "" && addoredit == 'edit')
	 {
		   $.ajax({
					type: 'POST',
					url: "actions.php",
					dataType: 'json',
					data: "edit=yes&misID="+id+"+&"+formData,
					success: function(response){
				if(response.err == '')
				{	             
				$("#response_msg").text("");	

				}
				else
				{
					
					$.jGrowl("Record Updated.", {
						header: 'Success!',
						theme: 'bg-success'
				});	
				$("#response_msg").text(response.err);	
				}
					 
						}

	});


	 }
	 else if(id == "" && addoredit == 'add')
	 {
	 var insid = $("#insertID").val();
	// alert(insid+" xxxx");
  	   $.ajax({
 				type: 'POST',
 				url: "actions.php",
 				dataType: 'json',
 				data: "add=yes&insertID="+insid+"&"+formData,
 				success: function(response){ 
				//console.log(response);  
				
				if(response.msg == 'Barcode found'){
				$("#receivdate").val("<?=date("d-F-Y")?>");

				$("#candidatename").val(response.v_name);
				$("#clientname").val(response.Client);
				
				$("#componenets").val(response.checks_title);
				$("#componenets").select2(); 
				
				if(response.checks_title!='Education'){
				$("#ianame").hide();
				$("#ianame").attr('disabled','disabled');
				$("#ianame_other").show();	
				$("#ianame_other").removeAttr('disabled');						
				}else{
				$("#ianame").show();
				$("#ianame").removeAttr('disabled');		
				$("#ianame").val(response.ia_name);
				$("#ianame").select2();
				$("#ianame_other").attr('disabled','disabled');
				$("#ianame_other").hide();	
				}
				
				
				 
				
				
				$("#cnicnum").val(response.v_nic);
				$("#fathername").val(response.v_ftname);	
				}
				
 			if(response.msg == 'success')
			{	
		 $.jGrowl('Record Updated.', {
						header: 'Success!',
						theme: 'bg-success'
						});
		
		 
            $("#aaaaa").val(response); 
			//insertID 
			//windows.localtion.reload();
			$("#insertID").val(response.insertID);
			$("#response_msg").text("");	

			
			
			if(response.v_name != "-" && response.Client != "-" && response.checks_title != "-"  && response.ia_name != "-" ) 
			{
			
			$('#receivdate').prop('readonly', true);
			$('#clientname').prop('readonly', true);
			$('#candidatename').prop('readonly', true);
			$('#componenets').prop('readonly', true);
			$('#ianame').prop('readonly', true);
			$('#cnicnum').prop('readonly', true);
			$('#fathername').prop('readonly', true);
			
			}
			else
			{
			$('#clientname').prop('readonly', false);
			$('#candidatename').prop('readonly', false);
			$('#componenets').prop('readonly', false);
			$('#ianame').prop('readonly', false);
			$('#cnicnum').prop('readonly', false);
			$('#fathername').prop('readonly', false);
			}
			//if(response.v_name != "-" || response.Client != "-" || response.checks_title != "-" ) 
			//{location.reload(true);
			//}
			
			} 
			else
			{
				if(response.msg == 'Barcode found' || response.err == 'Updated' || response.msg == 'Updated'){
				 $.jGrowl(response.msg, {
						header: 'Success!',
						theme: 'bg-success'
						});		
				}else{
					 $.jGrowl(response.err, {
						header: 'Error!',
						theme: 'bg-danger'
						});	
				}
			
			
			
			
			$('#clientname').prop('readonly', false);
			$('#candidatename').prop('readonly', false);
			$('#componenets').prop('readonly', false);
			$('#ianame').prop('readonly', false);
			$('#cnicnum').prop('readonly', false);
			$('#fathername').prop('readonly', false);

			$("#insertID").val(response.insertID);

			}
				 
					}
	});


	 }
	 else
	{
		alert("Hello!!!");
	}
	 
	 
	 
	 
	 
	}	


	function getallsubcats()
	{	
			$('#ifnocatselect').hide();

		var checksource = $("#checksource").val(); //getsubcats
		if(checksource == "Local")
		{
			
	 
			$('#subcat_local').show();
		
			$('#subcat_df').hide();
		}
		else if(checksource == "DF")
		{
			$('#subcat_df').show();
			
			$('#subcat_local').hide();
		}
		else
		{
			$('#subcat_df').hide();
			$('#subcat_local').hide();
			$('#ifnocatselect').show();
			
		}
		
		//alert(checksource);
	}
	


	function getfilx(id)
	{ alert(id);
		   $.ajax({
					type: 'POST',
					url: "https://backcheck.io/verify/testfordocx.php?id="+id,
					dataType: 'json',
					data: "getfilex=yes&fileid=2222&" ,
					success: function(response){
				if(response.err == '')
				{
				}
					 
						}
	 
	});


	}
	
	function setIAField(vl){
		if(vl!='Education'){
			
				$("#ianame").hide();
				$("#ianame").attr('disabled','disabled');
				$("#ianame_other").show();	
				$("#ianame_other").removeAttr('disabled');				
				}else{
				$("#ianame").show();
				$("#ianame").removeAttr('disabled');
				$("#ianame_other").attr('disabled','disabled');
				$("#ianame_other").hide();	
				}
		
	}
	
	
	
	function checkfield_redirect()
	{
			var clientname = $("#clientname").val();
			var receivdate = $("#receivdate").val();
			var checksource = $("#checksource").val();
			var candidatename = $("#candidatename").val();
			var componenets = $("#componenets").val();
			var ianame = $("#ianame").val();
			var status = $("#status").val();
			var qualification_detail = $("#qualification_detail").val();
			var cnicnum = $("#cnicnum").val();
			var fathername = $("#fathername").val();
			
			if(clientname != "" && clientname != "-" && receivdate != "" && receivdate != "-"
			 && checksource != "" && checksource != "-"
			 && candidatename != "" && candidatename != "-"
			  && componenets != "" && componenets != "-"
			   && ianame != "" && ianame != "-"
			    && status != "" && status != "-"
				 && fathername != "" && fathername != "-"
				 && qualification_detail != "" && qualification_detail != "-"
			)
			{
				window.location.reload();
			}
			else
			{
				alert("Please Fill All Mandatory Fields.");
			}
	}
</script>

<div class="content-wrapper">

<section class="retracted scrollable">

	<div class="page-header">
        <div class="page-header-content">
            <div class="page-title2">
                <h1><?=$IPAGE['m_actitle']?></h1>
            </div>
        </div>             
     </div>
	
    <div class="content">
    	<div class="row">
            <div class="col-md-12">
               
           

                          <!-- Modal -->
 		<div class="panel panel-flat">

        <h5 for="" class="col-lg-2 control-label">Filter Records:</h5>
     <!--<a href="#" onclick="getfilx()" >Download File</a>       -->
	 
	 <div class="panel-body">
	 
            <form action="?action=demanddraft&atype=sub_ref_num" class="table-form"  method="post">
             
				<div class="form-group">&nbsp;</div>
				
                <div class="form-group">
                <div class="row" >
				
				<div class="col-lg-4">
				<select name="search_ianame" id="search_ianame"  class="select" >
                    <option value="-">-- Filter by IA name --</option>
				<?php
				$sql = "SELECT uni_Name FROM `uni_info` order by uni_Name";
				$data = @mysql_query($sql);
				while($rows = @mysql_fetch_array($data)){
				?>    
					<option value="<?=$rows['uni_Name']?>"  <?php echo chk_or_sel($rows['uni_Name'],$_REQUEST['search_ianame'],'selected');?>>
				 <?=$rows['uni_Name']?></option>
                    <?php
					}
					?>   
                    	 
           		    </select>
				</div>
							
				<div class="col-lg-4">
                    <select name="search_chk_source" id="search_chk_source"  class="select" >
                    <option value="-">-- Filter by check source --</option>		
                    <option value="Savvion" <?php echo chk_or_sel('Savvion',$_REQUEST['search_chk_source'],'selected');?>>Savvion</option>
                    <option value="Veriflow" <?php echo chk_or_sel('Veriflow',$_REQUEST['search_chk_source'],'selected');?>>Veriflow</option>
                    <option value="DF-Offline" <?php echo chk_or_sel('DF-Offline',$_REQUEST['search_chk_source'],'selected');?>>DF-Offline</option>
                    <option value="LO-Offline" <?php echo chk_or_sel('LO-Offline',$_REQUEST['search_chk_source'],'selected');?>>LO-Offline</option>
                    <option value="Bitrix" <?php echo chk_or_sel('Bitrix',$_REQUEST['search_chk_source'],'selected');?>>Bitrix</option>
                    </select>
				</div>
				
                <div class="col-lg-1"><button class="btn btn-lg btn-success" type="submit" name="filter_mis_rec"> <span>   Search  </span> </button></div>
				
				
                </div>
              </div>
              
            </form>
            </div>
	 
	 	</div>
	 
           <div class="clear"></div> 
            <div class="panel panel-flat">
            <div class="panel-body">
            
            <div id="dt2">
            <div id="response_msg"></div>
			 <div class="col-md-3">
             
             <?php /*?><a href="<?php echo SURL;?>?action=demanddraft&atype=sub_ref_num" ><?php */?>
             
             
             <button class="btn btn-success has_text" title="Add New Record" onclick="checkfield_redirect();"><span><i class="icon-plus3"></i></span></button>
             
             
             <!--</a>-->
			</div>
		<form method="post" enctype="multipart/form-data" id="reference_letter_form" name="reference_letter_form">
        <input type="hidden" name="ePage" value="add_rating" />
        <input type="hidden" name="missystem" value="yes" />
          <input type="hidden" name="insertID" id="insertID"  />
		  <input type="hidden" name="download_letter" id="download_letter"  />
		  <div class="row">
            <div class="col-md-3 pull-right">
			 <a  value="Download Reference Letter"  href="javascript:void(0)" onclick="download_reference_letter()" class="btn btn-lg filebtn btn-success float-right" style="" >Download Reference Letter</a>
	
	
			</div>
			</div>
        
        <div class="table-responsive">
        
          <table class="table table-striped" id="tableSortable222">
           
            <thead>
                <tr>
				<th style="display:none;">&nbsp;</th>
                    <th> <input type="checkbox" id="select_all"/></th> 
					<th>Sr.#</th>
					<th>IA Name</th>
					<th>Receiving Date</th>
                    <th>Check Source</th>
                    <!--<th >Sub Category</th>-->
                    <th>Barcode</th>
                    <th>Client Name</th>
                    <th>Candidate Name</th>
                    <th>Components</th>
                    <th>Status</th>
					<th>Age</th>
					
					<th>Qualification/ Component Detail</th>
					<th>Father Name</th>
					<th>Cnic #</th>
					<th>Close Date</th>
					<th>Closed TAT</th>
					<th>Roll #</th>
					<th>DD Amount</th>
					<th>DD Number</th>
					<th>Letter Ref. Number</th>
					<th>Sent Date</th>
					<th>Out Courier Company.</th>
					<th>Out Courier No.</th>
					<th>Status</th>
					<th>Followup-1</th>
					<th>Followup-2</th>
					<th>Followup-3</th>
					<th>Followup-4</th>
					<th>Followup-5</th>
					<th>In Courier Company</th>
					<th>In Courier No.</th>
					<th>Date Time</th>
					



                    <?php if($LEVEL!=3){ ?><th>Actions</th><?php } ?>
                </tr>
            </thead>
           
            <tbody>
            <?php 
                $tbls = "mis_management_system";
				//echo "select * from $tbls $where ORDER BY dd_id DESC";
              ?>
              
               <tr>
				    <td style="display:none;">1</td>
				    <td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<?php
                        $sql = "SELECT * FROM `uni_info` order by uni_Name";
                        $data = mysql_query($sql);
                        
                        ?>
                        <select name="ianame" id="ianame" onchange="mainfunction('add','')"  style="width: 162px;" class="">
                        <option value="-">-- Select IA Name --</option>
                        <?php
                        while($rows = mysql_fetch_array($data)){
                        ?>    
                        <option value="<?=$rows['uni_Name']?>"><?=$rows['uni_Name']?></option>
                        <?php
                        }
                        ?>   
                        </select>
						  <input id="ianame_other" type="text" name="ianame_other"  class="form-control" placeholder="Type IA name"  value="" onblur="mainfunction('add','')" style="display:none;">
                    </td>
					
					<td>
                    <input id="receivdate" type="text" name="receivdate"  class="datetimepicker-month1ss form-control" placeholder="Search by Start Date"  value="-" onblur="mainfunction('add','')">            
					</td>
                    <td>
                    <select name="checksource" id="checksource" onchange="mainfunction('add','')" class="select">
                    	<option value="">--Select Check Source--</option>
                    	<option value="Savvion">Savvion</option>
                     	<option value="Veriflow">Veriflow</option>
                     	<option value="DF-Offline">DF-Offline</option>
                     	<option value="LO-Offline">LO-Offline</option>
                     	<option value="Bitrix">Bitrix</option>
                     </select>
                    <div id="getsubcats"></div>
                    </td> 
                   
                    <td><input type="text" name="barcode" id="barcode" placeholder="Barcode" onblur="mainfunction('add','')"  value="-" /></td>
                    <td><input type="text" name="clientname" id="clientname" placeholder="Client Name" readonly onblur="mainfunction('add','')"  value="-" /></td>
                    <td><input type="text" name="candidatename" readonly id="candidatename" placeholder="Candidate Name" onblur="mainfunction('add','')"  value="-"  /></td>
                     
                    <td>
                    <?php
					$checks = $db->select("checks","checks_title,checks_id","is_active=1");
					 
					?>

                    <select name="componenets" id="componenets" onchange="mainfunction('add',''); setIAField(this.value);" readonly="readonly" class="">
                    	<option value="">Select Component</option>
                        <?php
                        while($check = mysql_fetch_assoc($checks))
						{
							echo '<option value='.$check['checks_title'].'>'.$check['checks_title'].'</option>';
						}
						?>
                        
                     </select>
                    </td>
                    <td>
                    <select name="status" id="status" onchange="mainfunction('add','')" class="select">
                    	<option value="-">-- Select Status --</option>
                    	<option value="Not Initiated">Not Initiated</option>
                    	<option value="WIP">WIP</option>
                    	<option value="Insufficient">Insufficient</option>
                    	<option value="Unable to Verify">Unable to Verify</option>
                    	<option value="Online Result Found">Online Result Found</option>
                    	<option value="Verbal OK">Verbal OK</option>
                    	<option value="Verified Verbal">Verified Verbal</option>
                    	<option value="Verified Written">Verified Written</option>
                    	<option value="Verified Online">Verified Online</option>
                    	<option value="Verified Negative">Verified Negative</option>
            		    </select>
                    </td>
					<td><input type="text" name="age" id="age" placeholder="Age" value="-" onblur="mainfunction('add','')"/></td>
					
					<td><input name="qualification_detail" id="qualification_detail" placeholder="Qualification / Component Detail" value="-" onblur="mainfunction('add','')"/></td>
					<td><input name="fathername" id="fathername" placeholder="Father Name" value="-" onblur="mainfunction('add','')"/></td>
					<td><input type="text" name="cnicnum" id="cnicnum" placeholder="Cnic #" value="-" onblur="mainfunction('add','')"/></td>
					<td><input type="text" name="closeddate" id="closeddate" placeholder="Close Date"  onblur="mainfunction('add','')" value="-" class="datetimepicker-month1ss"/></td>
					<td><input type="text" name="closedtat" id="closedtat" placeholder="Closed TAT" onblur="mainfunction('add','')" value="-" /></td>
					<td><input type="text" name="rollnum" id="rollnum" placeholder="Roll #" onblur="mainfunction('add','')" value="-"/></td>
					<td><input type="text" name="ddamount" id="ddamount" placeholder="DD Amount" onblur="mainfunction('add','')" value="-"/></td>
					<td><input type="text" name="ddnumber" id="ddnumber" placeholder="DD Number" onblur="mainfunction('add','')" value="-"/></td>
					<td><input type="text" name="letter_ref_num" id="letter_ref_num" placeholder="Letter Ref. Number" value="-" onblur="mainfunction('add','')"/></td>
					<td><input type="text" name="sent_date" id="sent_date" placeholder="Sent Date"  onblur="mainfunction('add','')" class="datetimepicker-month1ss"/></td>
					<td><input type="text" name="out_mail_courier_company" id="out_mail_courier_company" placeholder="Out mail courier company"  onblur="mainfunction('add','')"/></td>
					<td><input type="text" name="out_mail_courier_num" id="out_mail_courier_num" placeholder="Out mail courier num"  onblur="mainfunction('add','')"/></td>
					<td><input type="text" name="out_mail_status" id="out_mail_status" placeholder="Out mail status"  onblur="mainfunction('add','')"/></td>
					<td><textarea name="followup1" id="followup1" placeholder="Followup-1" onblur="mainfunction('add','')">-</textarea></td>
					<td><textarea name="followup2" id="followup2" placeholder="Followup-2" onblur="mainfunction('add','')">-</textarea></td>
					<td><textarea name="followup3" id="followup3" placeholder="Followup-3" onblur="mainfunction('add','')">-</textarea></td>
					<td><textarea name="followup4" id="followup4" placeholder="Followup-4" onblur="mainfunction('add','')">-</textarea></td>
					<td><textarea name="followup5" id="followup5" placeholder="Followup-5" onblur="mainfunction('add','')">-</textarea></td>
					<td><input type="text" name="couriercompany" id="couriercompany" placeholder="Courier Company" value="-" onblur="mainfunction('add','')" /></td>
					<td><input type="text" name="couriernumber" id="couriernumber" placeholder="Curier Number" value="-" onblur="mainfunction('add','')" /></td>
					<td><input type="text" name="mdate" id="mdate" placeholder="Date and time" value="-" onblur="mainfunction('add','')" class=""/></td>
					
                    <?php if($LEVEL!=3){ ?><td>Actions</td><?php } ?>	
                    </tr>
                    <!--<tr>
                    <td><input type="button" name="submitrec" onclick="ifaddnew(); mainfunction('add','')" value="Submit"  />
                    </td></tr>-->
                
              
              <?php 
			 
			$userWise = ($LEVEL==2 || $LEVEL==1)? $where :" $where AND created_by='$uID'  AND is_dlt=0 ";
			
			$db_count = $db->select($tbls,"COUNT(misID) as cnt","(1=1) $userWise ");
			$db_count =  mysql_fetch_array($db_count);
			$db_count = $db_count['cnt'];
			
			if($db_count>0){
			
				$data = $db->select($tbls,"*","1=1 $userWise ORDER BY misID DESC");
                $inx = 0;
				$cc = -1;
				$cnt = @mysql_num_rows($data);
				while($re = mysql_fetch_array($data)) { $inx++; $cc++;
					$uni = $db->select("uni_info","*","uni_id=$re[ianame]");
					$uni = mysql_fetch_assoc($uni); 
					$userInfo = getUserInfo($re[created_by]);
					$fullName = $userInfo['first_name'].' '.$userInfo['last_name'];
					$is_dlt = $re[is_dlt];
					$deletedRow = ($is_dlt==1)?"style='background-color:#F2DCDB;'":"";
					?>
               <tr id="row_<?=$re['misID']?>" <?php echo $deletedRow;?>>
			   <td style="display:none;"><?=$inx?></td>
				<td style="width: 152px;display: block;padding-top: 36px;"><input type="checkbox" name="record_id[]" id="record_id_<?=$cc?>" class="cheks styled" value="<?=$re['misID']?>" /> <?php echo $fullName; ?> </td>
					<td aria-expanded="true" data-placement="top" title="Inserted By: <?php echo $fullName; ?>" data-original-title="Added By <?php echo $fullName; ?>" data-popup="tooltip" data-trigger="hover" data-container="body"><?=$inx?></td>
					<td>
                      <?=urldecode($re['ianame'])?>
					<input type="hidden" name="ia_name_<?=$re['misID']?>" id="ia_name_<?=$re['misID']?>"  value="<?=urldecode($re['ianame'])?>"/>
					<input type="hidden" name="ianames[]" id="ianame_<?=$re['misID']?>"  value="<?=urldecode($re['ianame'])?>" class="each_ianame" />
                    
                    </td>
					<td>
                    <?=$re['receivingdate']?>         
					</td>
                    <td>
                    
                    <?=$re['checkSource']?>
                    </td>
                    
                    <td>
                    <?=urldecode($re['barcode'])?>
                    
                    </td>
                    
                    <td>
                    <?=urldecode($re['clientname'])?>
                    </td>
                    
                    <td>
                    <?=urldecode($re['candidateName'])?>
                    </td>
                     
                    <td>
                    <?php
                   //$tCheck = getCheck($re['components'],0,0);
				   echo $re['components'];
					?>
                    </td>
                    <td>
                    <select name="status_<?=$re['misID']?>" id="status_<?=$re['misID']?>" onchange="mainfunction('edit','<?=$re['misID']?>')" class="select">
                    	<option value="-">-- Select Status --</option>
 		  
                    	<option value="Not Initiated">Not Initiated</option>
                    	<option value="WIP">WIP</option>
                    	<option value="Insufficient">Insufficient</option>
                    	<option value="Unable to Verify">Unable to Verify</option>
                    	<option value="Online Result Found">Online Result Found</option>
                    	<option value="Verbal OK">Verbal OK</option>
                    	<option value="Verified Verbal">Verified Verbal</option>
                    	<option value="Verified Written">Verified Written</option>
                    	<option value="Verified Online">Verified Online</option>
                    	<option value="Verified Negative">Verified Negative</option>


				  </select>
                    <script>$('#status_<?=$re['misID']?>').val("<?=$re['status']?>");</script>
                    </td>
					<td><input type="text" name="age_<?=$re['misID']?>" id="age_<?=$re['misID']?>" placeholder="Age" value="<?=$re['age']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
					
					<td>
					<?=$re['qualification_detail']?>
					</td>

					<td><?=urldecode($re['fatherName'])?></td>
                    
					<td><?php if($re['cnicno']){echo $re['cnicno'];}else{echo "-";}?></td>
                    
					<td><input type="text" name="closeddate_<?=$re['misID']?>" id="closeddate_<?=$re['misID']?>" placeholder="Close Date" value="<?=$re['closedate']?>" class="datetimepicker-month1ss" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="closedtat_<?=$re['misID']?>" id="closedtat_<?=$re['misID']?>" placeholder="Closed TAT" value="<?=$re['closedTAT']?>" 
					onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="rollnum_<?=$re['misID']?>" id="rollnum_<?=$re['misID']?>" placeholder="Roll #" value="<?=$re['rollno']?>" 
					onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="ddamount_<?=$re['misID']?>" id="ddamount_<?=$re['misID']?>" placeholder="DD Amount" value="<?=$re['ddamount']?>"/><input type="hidden" name="dd_amount[]"  value="<?=$re['ddamount']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="ddnumber_<?=$re['misID']?>" id="ddnumber_<?=$re['misID']?>" placeholder="DD Number" value="<?=$re['ddnum']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="letter_ref_num_<?=$re['misID']?>" id="letter_ref_num_<?=$re['misID']?>" placeholder="Letter Ref. Number" value="<?=$re['letter_ref_num']?>" /><input type="hidden" name="letter_ref[]"   value="<?=$re['letter_ref_num']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="sent_date_<?=$re['misID']?>" id="sent_date_<?=$re['misID']?>" placeholder="Sent Date" value="<?=$re['sent_date']?>" class="datetimepicker-month1ss" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
					<td><input type="text" name="out_mail_courier_company_<?=$re['misID']?>" id="out_mail_courier_company_<?=$re['misID']?>" placeholder="Out mail courier company" value="<?=$re['out_mail_courier_company']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
					<td><input type="text" name="out_mail_courier_num_<?=$re['misID']?>" id="out_mail_courier_num_<?=$re['misID']?>" placeholder="Out mail courier number" value="<?=$re['out_mail_courier_num']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
					<td><input type="text" name="out_mail_status_<?=$re['misID']?>" id="out_mail_status_<?=$re['misID']?>" placeholder="Out mail status" value="<?=$re['out_mail_status']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><textarea name="followup1_<?=$re['misID']?>" id="followup1_<?=$re['misID']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" placeholder="Followup-1"><?=$re['followup_1']?></textarea></td>
					<td><textarea name="followup2_<?=$re['misID']?>" id="followup2_<?=$re['misID']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" placeholder="Followup-2"><?=$re['followup_2']?></textarea></td>
					<td><textarea name="followup3_<?=$re['misID']?>" id="followup3_<?=$re['misID']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" placeholder="Followup-3"><?=$re['followup_3']?></textarea></td>
					<td><textarea name="followup4_<?=$re['misID']?>" id="followup4_<?=$re['misID']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" placeholder="Followup-4"><?=$re['followup_4']?></textarea></td>
					<td><textarea name="followup5_<?=$re['misID']?>" id="followup5_<?=$re['misID']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" placeholder="Followup-5"><?=$re['followup_5']?></textarea></td>
                    
					<td><input type="text" name="couriercompany_<?=$re['misID']?>" id="couriercompany_<?=$re['misID']?>" placeholder="Courier Company" value="<?=$re['courier_company']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="couriernumber_<?=$re['misID']?>" id="couriernumber_<?=$re['misID']?>" placeholder="Curier Number" value="<?=$re['curier_num']?>" onblur="mainfunction('edit','<?=$re['misID']?>')" /></td>
                    
					<td><input type="text" name="mdate_<?=$re['misID']?>" id="mdate_<?=$re['misID']?>" placeholder="Date" value="<?=$re['mdate']?>" class="alldatetimes" /></td>
                    
					
                    
                    <?php if($LEVEL!=3){ ?><td><a href="javascript:;" onclick="deleteRec(<?=$re['misID']?>);"><i class="icon-cross"></i></a></td><?php } ?>	
                 </tr>
            <?php }
				}
				else
				{?>
               
				<?php
                }?>
            </tbody>
			
			 
        </table>
        
        </div>
        
         </form>

 


            </div>
            </div>
            
		</div>

 	
       	 	</div>
        </div>
    </div><!---content end-->

</section>

</div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<link rel="stylesheet" href="js/datetimepicker/jquery-ui-timepicker-addon.css">
<script src="js/datetimepicker/jquery-ui-timepicker-addon.js"></script>

<script>
		
		




		
		
		
		
	$('#select_all').change(function() {
    var checkboxes = $(this).closest('form').find(':checkbox');
    if($(this).is(':checked')) {
        checkboxes.prop('checked', true);
    } else {
        checkboxes.prop('checked', false);
    }
});	


function download_reference_letter(){
	var selchbox = [];
	$('.cheks').each(function() {
        if(this.checked == true){
			selchbox.push($(this).val());
		};                        
     });
	 
	 if(selchbox==''){
		 alert("Please select atleast 1 record");
		 $.jGrowl("Please select atleast 1 record", {
						header: 'Error!',
						theme: 'bg-danger'
		});	
		 return false;
	 }else{
	var each_ianame = [];
	$('#download_letter').val(1);
	document.reference_letter_form.submit();
	
 	
	
		 }
	
}

	  function checkIfArrayIsUnique(arr) {
		var map = {}, i, size;
		
		for (i = 0, size = arr.length; i < size; i++){
			if (map[arr[i]]){
				//console.log(arr);
				return false;
			}

			map[arr[i]] = true;
		}

		return true;
	} 
 

		
		
 $(document).ready(function(){
    $("#txtFromDate").datepicker({
       // numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "1990:<?php echo date("Y");?>",
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
    });
    $("#txtToDate").datepicker({ 
       // numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "1990:<?php echo date("Y");?>",
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });  

   $(function () {
		$( ".datetimepicker-month1ss").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "1980:<?php echo date("Y");?>"
		});
		});


    $("#txtFromDatenew").datepicker({ 
       // numberOfMonths: 2,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: "1990:<?php echo date("Y");?>" 
        
    });  
	
	$('#mdate, .alldatetimes').datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat:  "hh:mm:ss"
});


});

				
</script>
