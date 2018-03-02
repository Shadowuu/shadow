@extends('Admin.index')
@section('title','公告列表')
@section('content')



	<div class="main-content">
					
			<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>公告标题</th>
														<th class="hidden-480">公告内容</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															发布时间
														</th>

														<th class="hidden-480">操作</th>
													</tr>
												</thead>

												<tbody>

												@foreach($res as $v)
													<tr id="remove{{ $v->id }}">

														
														<td>{{ $v->tit }}</td>
														<td class="hidden-480">{{ $v->cont }}</td>

														<td class="label-warning">
															<span class="">{{date('Y-m-d H:i:s',$v->time)}}</span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

																<a href="/admin/notice/{{$v->id}}/edit" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">修改公告</i>
																</a>

																<button onclick="del({{ $v->id }})" class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120">删除公告</i>
																</button>

																
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												@endforeach



													

													

													
												</tbody>
											</table>
											<div style="margin-left: 550px">{!! $res->render() !!}</div>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
								
								

								

								

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
						
					
		</div><!-- /.main-content -->

@endsection

@section('js')
<script src="/layer/layer.js"></script>
<script type="text/javascript">
    

	function del(id)
	{
		//获取要删除公告的id
            layer.confirm('确定删除?',{
                //特效层按钮
                btn:['确定','取消']
                },function(){
                    $.post('{{url("/admin/notice/")}}/'+id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							$('#remove'+id).remove();
                            layer.msg('公告删除成功!', {icon: 1});
							
                        }else{
                            layer.msg('公告删除失败!', {icon: 1});
                        }

                    });
                }    
            );
	}

	// function del(id)
	// {
	// 	//获取要删除公告的id
	//     layer.confirm('您确定要删除此公告吗？', {
	//     	//特效层按钮
	//       	btn: ['确定','取消']
	//         }, 
	//         function(){
	//         $.ajax({
	//         type: "post",
	//         url: '/admin/notice/'+id,
	//         data: {id:id,_token:'{{ csrf_token() }}',_method:'delete'},

	//         beforeSend:function(){
	//         //加载样式
	//         a = layer.load(0, {shade: false});},

	//         success: function(data) {
	//             //关闭加载样式
	//             layer.close(a)
	            
	//             layer.msg('公告删除成功!', {icon: 1});
	//             }, 
	//         })
	//     });
	// }

</script>

@endsection