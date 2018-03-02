@extends('Admin.index')
@section('title','微博列表')
@section('content')

	<div class="main-content">
					
			<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">

												<div class="widget-main">
													<form action="/admin/micro" class="form-search">
														<div class="row">
															<div class="col-xs-12 col-sm-8">
																<div class="input-group">
																	<input name="search" type="text" class="form-control search-query" placeholder="请输入搜索信息：" />
																	<span class="input-group-btn">
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
														
														<th>用户名</th>
														<th>微博内容</th>
														

														<th>
															<i class="icon-time bigger-110"></i>
															发布时间
														</th>
														<th>评论量</th>
														<th>转发量</th>
														<th>点赞量</th>
														<th>举报次数</th>
														<th>操作</th>
													</tr>
												</thead>
												@foreach($mblog as $v)
												<tbody>
													<tr>
														
														<td>
															
														</td>
														<td>{{ $v->cont }}</td>
														<td class="hidden-480">{{ $v->time }}</td>
														
														<td class="hidden-480">
															<span>{{ $v->comment }}</span>
														</td>

														<td class="hidden-480">
															<span>{{ $v->forward }}</span>
														</td>

														<td class="hidden-480">
															<span>{{ $v->gods }}</span>
														</td>

														<td class="hidden-480">
															<span class="label-warning"></span>
														</td>

														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">设置热门</i>
																</button>

																<button class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120">删除微博</i>
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

													

													
												</tbody>
												@endforeach
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->

								<div class="hr hr-18 dotted hr-double"></div>

								

								

								
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div style="margin-left: 550px">{!! $mblog->render() !!}</div>
					</div><!-- /.page-content -->


					
		</div><!-- /.main-content -->

@endsection

@section('js')

<script type="text/javascript">
    
</script>

@endsection