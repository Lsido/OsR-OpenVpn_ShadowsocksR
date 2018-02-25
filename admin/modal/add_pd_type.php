<?php if(!$p){exit();} ?>  
<script>	 
	 function limit(id,ip){
        $("#ip").val(ip);
         $("#value").val(id);
        $("#form-limit").modal("show");
    }
	</script>
<div id="form-limit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: rgba(4, 4, 4, 0.5);top: 120px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" style="color: #f5f5f5">添加商品分类</h4><br>
				 
                </div>
                <form class="modal-body form-horizontal" action="?action=add_shop&c=addtype" method="post">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="color: #f5f5f5">商品总类</label>
                        <div class="col-sm-8">
                           <select name="type" class="form-control">
                       
						<option value="1">ShadowSockS</option>
						<option value="2">OpenVPN</option>
                      </select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-2 control-label" style="color: #f5f5f5">商品子类</label>
                        <div class="col-sm-8">
                            <input type="text" name="pdtype" class="form-control" value="" />
                        </div>
                    </div>
					
					 
					
					 
 
                <div class="modal-footer">
                     
					
					 <button type="submit" class="btn btn-green">保存</button>
					 
					 
                     
                </div>
				 </form>
            </div>
        </div>
    </div>