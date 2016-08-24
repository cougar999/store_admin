<?php /* Smarty version 2.6.26, created on 2013-01-10 15:40:04
         compiled from question/repay.tpl */ ?>
<div class="" style="padding:10px 50px;">
	<textarea name="content" style="width:400px;height:100px;" class="quest_content"></textarea>
	<input type="hidden" value="<?php echo $_GET['id']; ?>
" name="relateid" class="relateid">
	<input type="submit" value="回答" onclick="submitQuestRepay(this);return false;">
</div>