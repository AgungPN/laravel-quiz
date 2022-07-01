<div>
    @push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded',function () {
/*         @this.on('triggerDelete',courseId => {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                @this.call('destroy',contactId)
                Swal.fire( 'Deleted!', 'Your file has been deleted.', 'success')
              }else{
                Swal.fire("Operation Cancelled!","cs")
              }
            })
        }) */
    @this.on('triggerDelete', id => {
        const isConfirm = confirm("Delete " + id)
        if(isConfirm){
            @this.call("destroy",id)
        }
    })
})
    </script>

    @endpush
</div>
