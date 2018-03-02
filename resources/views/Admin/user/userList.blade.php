@extends('Admin.index')
@section('title','用户列表')
@section('content')

	<div class="main-content">
					
			<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="widget-main">
													<form class="form-search" method="post" action="">
														<div class="row">
															<div class="col-xs-12 col-sm-8">
																<div class="input-group">
																	<input type="text" name="" class="form-control search-query" placeholder="请输入搜索信息：" />
																	<span class="input-group-btn">
																		{{csrf_field()}}
																		<button type="submit" class="btn btn-purple btn-sm">
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
														
														
														<th>用户昵称</th>
														<th class="hidden-480">手机号</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Update
														</th>
														<th class="hidden-480">状态</th>

														<th class="hidden-480">操作</th>
													</tr>
												</thead>

												<tbody>
												@foreach($usercont as $v)
													<tr>
														

														
														<td>{{ $v->name }}</td>
														<td class="hidden-480">3,330</td>
														<td>Feb 12</td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">Expiring</span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button class="btn btn-xs btn-success">
																	<i class="icon-ok bigger-120">冻结用户</i>
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
					<div style="margin-left: 550px">{!! $usercont->render() !!}</div>

					
		</div><!-- /.main-content -->

@endsection

@section('js')

<script type="text/javascript">
    
</script>

@endsection