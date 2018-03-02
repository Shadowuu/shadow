@extends('Admin.index')

@section('title','友情链接列表')

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
														<th>友链标题</th>
														<th class="hidden-480">友链地址</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															发布时间
														</th>

														<th class="hidden-480">操作</th>
													</tr>
												</thead>

												<tbody>

												@foreach($res as $v)
													<tr id="remove{{ $v->lid }}">

														<td>{{ $v->tit }}</td>
														<td class="hidden-480">{{ $v->url }}</td>

														<td>
															<span class="">{{date('Y-m-d H:i:s',$v->time)}}</span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

																<a href="/admin/link/{{$v->lid}}/edit" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">修改友链</i>
																</a>

																<button onclick="del({{ $v->lid }})" class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120">删除友链</i>
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
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

								<div class="hr hr-18 dotted hr-double"></div>

								

								

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					<div style="margin-left: 550px">{!! $res->render() !!}</div>

					
		</div><!-- /.main-content -->

@endsection

@section('js')
<script src="/layer/layer.js"></script>
<script type="text/javascript">
    

	function del(lid)
	{
		//获取要删除公告的id
            layer.confirm('确定删除友情链接?',{
                //特效层按钮
                btn:['确定','取消']
                },function(){
                    $.post('{{url("/admin/link/")}}/'+lid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							$('#remove'+lid).remove();
                            layer.msg('友情链接删除成功!', {icon: 1});
							
                        }else{
                            layer.msg('友情链接删除失败!', {icon: 1});
                        }

                    });
                }    
            );
	}



</script>

@endsection