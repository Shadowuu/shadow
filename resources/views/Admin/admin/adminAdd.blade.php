@extends('Admin.index')
@section('title','添加管理员')
@section('content')


						<div class="row">
							<div class="col-xs-8">
								<!-- PAGE CONTENT BEGINS -->

								<form action="/admin/admin" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">

									<div class="space-10"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名: </label>

										<div class="col-sm-9">
											<input name="name" type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-7"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码: </label>

										<div class="col-sm-9">
											<input name="pass" type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Inline help text</span>
											</span>
										</div>
									</div>

									<div class="space-7"></div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">确认密码:</label>

										<div class="col-sm-9">
											<input class="col-xs-10 col-sm-5" type="text" id="form-field-4" placeholder="" />
											<div class="space-2"></div>

											<div class="help-block" id="input-size-slider"></div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">性别:</label>

										<div class="col-sm-9">
											<div>
												<label class="">
													<input name="sex" value="0" type="radio" class="ace" />
														<span class="lbl"> 男</span>
												</label>
											</div>

											<div>
												<label class="">
													<input name="sex" value="1" type="radio" class="ace" />
														<span class="lbl"> 女</span>
												</label>
											</div>

											<div>
												<label class="">
													<input name="sex" value="2" type="radio" class="ace" />
														<span class="lbl"> 保密</span>
												</label>
											</div>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5">上传头像:</label>

										<div class="col-sm-9">
											<div class="clearfix">
												<input name="face" class="bigger-130 bolder" type="file" id="form-field-5"/>
											</div>

											<div class="space-2"></div>

											<div class="help-block" id="input-span-slider"></div>
										</div>
									</div>

									

									<div class="space-7"></div>

								

									
										<div class="col-md-offset-3 col-md-9">
										{{csrf_field()}}
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									

									<div class="hr hr-24"></div>

								</form>

								

								

								
							</div><!-- /.col -->
						</div><!-- /.row -->

@endsection

@section('js')

<script type="text/javascript">
    
</script>

@endsection