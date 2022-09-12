
      <div class="footer">
        <div>
            <p class="text-center">All Right reserved by Hot Grilll</br> Developed by<span style="color:aqua;"> Md Fahad Hossain</span></p>
        </div>
    </div>
    <!-- Footer section end here  -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    <!-- Script for active navbar from online tutorial(https://www.youtube.com/watch?v=7Vr1bngah-k) -->
    <script type="text/javascript">
        const currentLocation=location.href;
        const menuItem=document.querySelectorAll('a');
        const menuLength= menuItem.length
        for(let i=0; i<menuLength; i++){
            if(menuItem[i].href===currentLocation){
                menuItem[i].className="active"
            }
        }
    </script>  


</body>
</html>