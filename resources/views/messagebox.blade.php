@extends('layouts.app')

@section('content')
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        @if (session('error-status'))
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><b>Error:</b> {{ session('error-status') }}</center>
            </div>
        </div>
        @endif
        <div class="row">
            <br>
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Inbox</div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $m)
                                    <tr>
                                        <td><a href="{{ url('/message/'.$m->id) }}" @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->subject or '' }}</a></td>
                                        <td><span @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->created_at->diffForHumans() }}</span> <br><small>{{ $m->created_at->toDayDateTimeString() }}</small></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"><center><i>No messages in your inbox</i></center></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Sent Messages
                        <a href="{{ url('/message') }}" class="btn btn-sm btn-info float-right">
                            <i class="fa fa-plus"></i> New Message
                        </a>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages_sent as $m)
                                    <tr>
                                        <td><a href="{{ url('/message/'.$m->id) }}">{{ $m->subject or '' }}</a></td>
                                        <td>{{ $m->created_at->toDayDateTimeString() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"><center><i>You have not sent any messages yet</i></center></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
@endsection
