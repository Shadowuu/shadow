@extends('Admin.index')
@section('title','修改公告信息')
@section('content')

	<div class="row">
							<div class="col-xs-8">
								<!-- PAGE CONTENT BEGINS -->

								<form action="/admin/notice/{{$res->id}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

									<div class="space-10"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right lead" for="form-field-1"> 公告标题: </label>

										<br />

										<div class="col-sm-9">
											<input name="tit" type="text" value="{{$res->tit}}" id="" placeholder="" class="col-xs-10 col-sm-8" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right lead" for="form-field-1"> 公告内容: </label>

										<br />

										<div class="col-sm-9">
											<textarea name="cont" id="" cols="80" rows="15">{{ $res->cont }}</textarea>
										</div>
									</div>

									<div class="space-7"></div>

									
									<div class="space-7"></div>


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