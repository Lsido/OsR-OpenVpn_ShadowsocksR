
<?php 

if(!empty($_GET['id']))
{
$sql = "select * from web_gg where id = ? ";
$params = array($_GET['id']);
$data = $pdo->getOne($sql, $params);
 ?>

 
 <section>
	<div class="container">
		<h1><?=$data['g_name']?></h1>
		<p><strong><?=$data['g_time']?></strong></p>
		<hr>
			
			<pre style="white-space: pre-line;">
			
			<?=$data['g_conetent']?>
			
			</pre>

		 

		
		<p class="text-center"><a href="/member/announcements" title="« 返回" class="btn btn-default">« 返回</a></p>
	</div>
</section>

<?php }else{ ?>
 
 
<section>
	<div class="container">
		<h1>公告信息</h1>

				 
		
		<?php 

			 

			foreach($data as $value){
				
				echo "<div class='margin-bottom'>";
				echo "<h2 class='h3'><a href='/member/announcements/".$value['id']."'>".$value['g_name']."</a></h2>";
				echo "	<p>".$value['g_time']."</p>";
				echo "<blockquote>";
				echo "<p>".mb_strimwidth($value['g_conetent'], 0, 300, '...')."</p>";
				echo "	<small><a href='/member/announcements/".$value['id']."'>更多 »</a></small>";
				echo "</blockquote>";
				echo "</div>";
				echo "<hr>";
			 
				
			}









		?>
		
		<ul class="pagination">
			<li class="disabled">
				<a href="javascript:return false;" title="上一页">← 上一页</a>
			</li>
			<li class="disabled">
				<a href="javascript:return false;" title="下一页">下一页 →</a>
			</li>
		</ul>

	 
	</div>
</section>

<?php } ?>