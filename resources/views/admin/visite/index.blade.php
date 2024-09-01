<!DOCTYPE html>
<html lang="en">


@include("admin.pages.head")

<body>
  <div class="container-scroller d-flex">
     @include("admin.pages.sidebar")
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      @include('admin.pages.navbar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   
                  <h4 class="card-title">Demandes de visites</h4>
                 

                  <p class="card-description">
                   
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                        Image
                          </th>
                          <th>
                            Nom
                              </th>
                          <th>
                           Email
                          </th>
                          <th>
                            Tel
                          </th>
                          
                          <th>
                              Status
                            </th>
                            <th>
                              Date
                            </th>
                          
                          <th>
                            Valider
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($visiteAll as $visite)
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('storage/'.$visite->bien_immobilier->image)}}" alt="image"/>
                          </td>
                          <td>
                           {{$visite->client->nom}}
                          </td>
                          <td>
                            {{$visite->client->email}}


                          </td>
                          <td>
                            {{$visite->client->tel}}

                          </td>

                          <td>
                            {{$visite->status}}

                          </td>
                          <td>
                            {{$visite->date_propose}}

                          </td>
                          <td>
                            <a href="{{route('details.visite',['id'=>$visite->id])}}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{$visiteAll->links()}}
              </div>
            </div>
           
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- Button trigger modal -->


   


  </div>
   @include("admin.pages.js")
</body>

</html>
