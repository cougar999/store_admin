<?php /* Smarty version 2.6.26, created on 2013-01-11 14:59:51
         compiled from question/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate_utf8_string', 'question/index.html', 43, false),)), $this); ?>
<!-- content start -->
	<div id="wrapper">
		<div id="content">
			<div class="datatable">
				<?php if ($this->_tpl_vars['assign']['page']['items']): ?>
				<div class="datatableHeader">
					<h1 class="fl intitle">问答管理</h1>
				</div>
				
				<div id="TablePanel" class="datatablecontent">
					<table id="tableviewer" width="100%" border="0">
						<colgroup>
							<!-- <col width="40" /> -->
							<!-- <col width="60" /> -->
							<col width="auto" />
							<!-- <col width="80" /> -->
							<col width="150" />
							<col width="170" />
							<col width="170" />
						</colgroup>
						<tbody>
							<tr class="title">
								<!-- <th class="tc">
									<input type="checkbox" name="selector" id="selector" />
								</th> -->
								<!-- <th class="tc">ID</th> -->
								<th class="tc">问题</th>
								<!-- <th class="tc">状态</th> -->
								<th class="tc">提问用户</th>
								<th class="tc">更新时间</th>
								<th class="tc">创建时间</th>
							</tr>
							<?php $_from = $this->_tpl_vars['assign']['page']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
							<tr>
								<!-- <td class="tc"><input type="checkbox" name="pcroduct" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"/></td> -->
								<!-- <td class="tc"><?php echo $this->_tpl_vars['item']['id']; ?>
</td> -->
								<td class="quest_content" style="white-space:normal;">
									<div class="quest_tag fl">问题：</div>
									<a href="/question?action=getQuestRepay&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="view_repay"><?php echo $this->_tpl_vars['item']['content']; ?>
</a>
									<span class="ctrlpanel" style="float:right;">
										<a href="/question?action=getQuestRepay&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="view_repay" title="查看回答"><img src="/resources/images/icon_replist.png" alt="查看回答" title="查看回答"/></a>
										<a href="/question?action=repayTpl&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="quest_repay"><img src="/resources/images/icon_replay.png" alt="回答" title="回答"/></a> 
										<a href="/question?action=delAction&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="if(!confirm('确认删除问题“<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('truncate_utf8_string', true, $_tmp, 50, "...") : smarty_modifier_truncate_utf8_string($_tmp, 50, "...")); ?>
”'))return false;"><img src="/resources/images/icon_trash3.png" title="删除"/></a>
									</span>
									<div class="repay_form"></div>
									<div class="get_repay_list no"></div>
								</td>
								<!--<td class="tc"><?php if ($this->_tpl_vars['item']['status'] && $this->_tpl_vars['item']['status'] == 1): ?><a href="javascript:void(0);" onclick="changeStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
', 1,'question', this);">上线</a><?php else: ?><a href="javascript:void(0);" onclick="changeStatus('<?php echo $this->_tpl_vars['item']['id']; ?>
', 0, 'question', this);">下线</a><?php endif; ?></td>-->
								<td class="tc"><?php echo $this->_tpl_vars['item']['nickname']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['update_time']; ?>
</td>
								<td><?php echo $this->_tpl_vars['item']['create_time']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
				<div id="page">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'page.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
				<?php else: ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'empty_warning.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				
			</div>
			
			
		</div>
	</div>
<!-- content end -->
<script language="javascript">
$(function(){
	$(".quest_repay").toggle(
		function(){
			if($(this).closest(".ctrlpanel").next(".repay_form").html() != ''){
				$(this).closest(".ctrlpanel").next(".repay_form").show();
				return false;
			}else{
				var url = $(this).attr("href");
				$(this).closest(".ctrlpanel").next(".repay_form").load(url);
				return false;
			}
		},
		function(){
			$(this).closest(".ctrlpanel").next(".repay_form").hide();
			return false;
		}
	);
	$(".view_repay").toggle(
		function(){
			if($(this).closest(".quest_content").find(".get_repay_list").html() != ''){
				$(this).closest(".quest_content").find(".get_repay_list").removeClass('no').show();
				return false;
			}else{
				var url = $(this).attr("href");
				$(this).closest(".quest_content").find(".get_repay_list").load(url).removeClass('no');
				return false;
			}
		},
		function(){
			$(this).closest(".quest_content").find(".get_repay_list").hide();
			return false;
		}
	);
})
</script>