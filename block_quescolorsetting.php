<?php
/**
* @package block_quescolorsetting
* @author vimlesh
* @license https://technocodz.com
**/

/**
 * Block HTML
 */
class block_quescolorsetting extends block_base
{
	
	function init(){
		$this->title = get_string('pluginname','block_quescolorsetting');
	}
	function has_config(){
		return true;
	}
	function applicable_formats() {
		return array('all' => true);
	}
	function get_content(){
		global $DB,$USER;
		if($this->content!==NULL){
			return $this->content;
		}
		$id = required_param('attempt', PARAM_INT);
		$conditions=array('id'=>$id);
		$attempts=$DB->get_record('assignmentques_attempts', $conditions);
		if($attempts){
			$uniqueid = $attempts->uniqueid;
			$conditions=array('questionusageid'=>$uniqueid);
			$quesattempts=$DB->get_records('question_attempts', $conditions);			
		}
		$slot=0;	
		$content.='<div class="activityprgress">';
		foreach($quesattempts as $quesattempt){	
			$slot++;
			$conditions=array('questionattemptid'=>$quesattempt->id);
			$step=end($DB->get_records('question_attempt_steps', $conditions));
			if($step){
				$conditions=array('attempt'=>$id,'slot'=>$slot);
				$comment=end($DB->get_records('assignmentques_comment', $conditions));								
				if($comment){
					$status= $comment->status;
					if(!empty($status)){
						$showcolors = get_config('block_quescolorsetting',$status);					
						$content.='
						<a href="#question-'.$uniqueid.'-'.$slot.'">
							<span
							 style="background:'.$showcolors.';
								 height:40px;width:20px;
								 display: inline-block;" 
							class="'.$status.'"
							title="'.get_string($status,'assignmentques').'" 
							></span>
						</a>';
					}else{
						$showcolors = get_config('block_quescolorsetting','completecolor');
						$content.='
						<a href="#question-'.$uniqueid.'-'.$slot.'">
						<span 
							style="background:'.$showcolors.';
								height:40px;
								width:20px;
								display: inline-block;" 
							class="complete"
							title="Attempted" 
							></span>
						</a>';
					}		
					
				}else{
					if($step->state!='todo'){
						$showcolors = get_config('block_quescolorsetting','completecolor');
						$content.='
							<a href="#question-'.$uniqueid.'-'.$slot.'">
							<span 
								style="background:'.$showcolors.';
								height:40px;
								width:20px;
								display: inline-block;" 
								class="complete" 
								title="Attempted" ></span>
							</a>';
					}
					else{
						$showcolors = get_config('block_quescolorsetting','notcompletecolor');
						$content.='
							<a href="#question-'.$uniqueid.'-'.$slot.'">
							<span 
								style="background:'.$showcolors.';
								height:40px;
								width:20px;
								display: inline-block;" 
								class="complete" 
								title="Not Attempted" ></span>
							</a>';
					}
					
				}
			}else{
				$showcolors = get_config('block_quescolorsetting','notcompletecolor');
				$content.='
				<a href="#question-'.$uniqueid.'-'.$slot.'">
					<span 
						style="background:'.$showcolors.';
						height:40px;
						width:20px;
						display: inline-block;" 
						class="notcomplete" 
						title="Not Attempted"
						></span>
				</a>';
			}

		}
		$content.='</div>';
		$this->content = new stdClass;
		$this->content->text = $content;
		$this->content->footer = '';
		return $this->content;
	}
	
}