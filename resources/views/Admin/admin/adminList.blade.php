@extends('Admin.index')
@section('title','管理员列表')
@section('content')

	<div class="main-content">
					
			<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">

												<div class="widget-main">
													<form class="form-search">
														<div class="row">
															<div class="col-xs-12 col-sm-8">
																<div class="input-group">
																	<input type="text" class="form-control search-query" placeholder="请输入搜索信息：" />
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-purple btn-sm">
																			搜索
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button>
																	</span>
																</div>
															</div>
														</div>
													</form>
												</div>
											
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>编号</th>
														<th>管理员昵称</th>
														<th class="hidden-480">性别</th>

														<th>
															<i class="icon-time bigger-110 haidden-480"></i>
															登录时间
														</th>
														<th class="hidden-480">状态</th>

														<th class="hidden-480">操作</th>
													</tr>
												</thead>

												<tbody  >
												@foreach($admins as $v)
													<tr id="remove{{ $v->aid }}">
														
														<td>
															<a href="#">{{$v->aid}}</a>
														</td>
														<td>{{$v->name}}</td>
														<td class="hidden-480">
															@if ($v->sex==0)
																男
															@elseif($v->sex==1)
																女
															@else
																保密
															@endif
														</td>
														<td>{{$v->face}}</td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">Expiring</span>
														</td>

														<td >
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

																<a href="/admin/admin/{{$v->aid}}/edit" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">修改信息</i>
																</a>
																

																<button onclick="dele({{ $v->aid }})" class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120">删除管理员</i>
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
											<div style="margin-left: 550px">{!! $admins->render() !!}</div>
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
 //    function dele(aid)
	// {
	// 	//获取要删除的aid
	//     layer.confirm('您确定要删除此管理员吗？', {
	//     	//特效层按钮
	//       	btn: ['确定','取消']
	//         }, 
	//         function(){
	//         $.ajax({
	//         	headers: {
 //            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //        		}
	//         type: "post",
	//         url: '/admin/admin/'+aid,
	//         data: {aid:aid, _token:'{{ csrf_token() }}',_method:'delete'},

	//         beforeSend:function(){
	//         //加载样式
	//         a = layer.load(0, {shade: false});},

	//         success: function(data) {
	//             //关闭加载样式
	//             layer.close(a)
	//             //移除微博
	//             if(data==1){
 //                     	layer.msg('管理员删除成功！！', {icon: 1});
 //                    }else{
 //                        layer.msg('管理员删除失败！！', {icon: 2});

 //                    }
	//         })
	//     });
	// }
	function dele(aid)
	{
		//获取要删除公告的id
            layer.confirm('确定删除此管理员?',{
                //特效层按钮
                btn:['确定','取消']
                },function(){
                    $.post('{{url("/admin/admin/")}}/'+aid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							$('#remove'+aid).remove();
                            layer.msg('管理员删除成功!', {icon: 1});
							
                        }else{
                            layer.msg('管理员删除失败!', {icon: 1});
                        }

                    });
                }    
            );
	}
</script>

@endsection