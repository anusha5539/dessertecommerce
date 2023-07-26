
<div class="container">
    <div class="row">
        <div class="col">
            <div class="my-5" style="text-align:center">
                <h1 class="mb-4">Comments</h1>
                <form action="{{url('/add_comment')}}" method="post">
                    @csrf
                    <textarea placeholder="Comment something here.." class="box mb-3" name="comment" id="" cols="70"
                        rows="7"></textarea><br>
                    <input style="background-color:rgb(121, 8, 8)" type="submit" value="Comment" class="btn text-light">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div style="padding-left:25%;" class=" border">
                <h3 class="my-3 ">All comments</h3>
                @foreach($comment as $comments)
                <div class="mb-3">
                    <b>{{$comments->name}}</b>
                    <p>{{$comments->comment}}</p>
                    <a href="javascript::void(0)" style="text-decoration:none;" class="text-primary" onclick="reply(this)" data-Commentid="{{$comments->id}}" >Reply</a>
                    @foreach($reply as $replies)
                    @if($replies->comment_id==$comments->id)
                    <div class="ml-3 mt-3">
                        <b>{{$replies->name}}</b>
                        <p>{{$replies->reply}}</p>
                        <a href="javascript::void(0)" style="text-decoration:none;" class="text-primary" onclick="reply(this)" data-Commentid="{{$comments->id}}" >Reply</a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
                <!-- reply textbox -->
                <div style="display:none" class="replyDiv">
                <form action="{{url('/add_reply')}}" method="post">
                    @csrf
                <input type="text" name="commentId"  id="commentId" hidden>
                    <textarea name="reply" id="" cols="50" rows="5"
                        placeholder="Write something here"></textarea><br>
                        <input type="submit" value="Reply" style="background-color:rgb(121, 8, 8);"
                        class="btn btn-primary btn-outline-light text-light">
                    <a href="javascript::void(0)" onclick="reply_close(this)"
                        class="btn btn-dark">Close</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function reply(caller) {
        document.getElementById('commentId').value=$(caller).attr('data-Commentid')
        $('.replyDiv').insertAfter($(caller))
        $('.replyDiv').show();
    }
    function reply_close(caller){
        $('.replyDiv').hide();
    }
  
    document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function (e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });

</script>
