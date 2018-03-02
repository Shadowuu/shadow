@extends('Admin.index')
@section('title','修改管理员信息')
@section('content')


						<div class="row">
							<div class="col-xs-8">
								<!-- PAGE CONTENT BEGINS -->

								<form action="/admin/admin/{{$res->aid}}" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">

									<div class="space-10"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名: </label>

										<div class="col-sm-9">
											<input name="name" type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" value="{{$res->name}}" />
										</div>
									</div>

									<div class="space-7"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码: </label>

										<div class="col-sm-9">
											<input name="pass" type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" value="{{$res->pass}}" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Inline help text</span>
											</span>
										</div>
									</div>

									<div class="space-7"></div>


									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-4">性别:</label>

										<div class="col-sm-9">
											<div>
												<label class="">
													<input name="sex" value="0" type="radio" class="ace" @if($res->sex == '0') checked @endif/>
														<span class="lbl"> 男</span>
												</label>
											</div>

											<div>
												<label class="">
													<input name="sex" value="1" type="radio" class="ace" @if($res->sex == '1') checked @endif/>
														<span class="lbl"> 女</span>
												</label>
											</div>

											<div>
												<label class="">
													<input name="sex" value="2" type="radio" class="ace" @if($res->sex == '2') checked @endif/>
														<span class="lbl"> 保密</span>
												</label>
											</div>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5">头像:</label>

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
										{{ csrf_field() }}
           								{{ method_field('PUT') }}
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											
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