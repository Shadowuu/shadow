@extends('Admin.index')
@section('title','添加友情链接')
@section('content')

	<div class="row">
							<div class="col-xs-8">
								<!-- PAGE CONTENT BEGINS -->

								<form action="/admin/link" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">

									<div class="space-10"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right lead" for="form-field-1"> 请输入友链标题: </label>

										<br />

										<div class="col-sm-9">
											<input name="tit" type="text" id="" placeholder="" class="col-xs-10 col-sm-8" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right lead" for="form-field-1"> 请输入友链网络地址: </label>

										<br />

										<div class="col-sm-9">
											<a href=""><textarea name="url" id="" cols="80" rows="5"></textarea></a>
										</div>
									</div>

									<div class="space-7"></div>
					
									<div class="space-7"></div>

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