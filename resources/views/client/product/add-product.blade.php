@include('client.component.head')
@include('client.component.header')
@include('client.component.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
           

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- SELECT2 EXAMPLE -->
                    <form action="{{route('save-product')}}" method="POST"  class="mt-4" enctype='multipart/form-data'>
                             @csrf
                             <div class=" form-row p-2">
                    <div class="card card-default mt-5" style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
                        <div class="card-header" style="background-color: #f7f7f7;">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="italic"><small>The field labels marked with * are required input fields.</small></p>
                             <div class="row p-2">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            id="exampleInputEmail1" placeholder="Enter Product Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Type *</label>
                                    <select class="form-control select2" name="type" style="width: 100%;" required>
                                    <option disabled>Choose...</option>
                                    @foreach($type as $types)
									<option value="{{$types->name}}">{{$types->name}}</option>
									@endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="pcode">Product Code *</label>
                                    <input type="text" name="product_code" id="pcode" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control select2" name="brand" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            @foreach($brand as $brands)
                                            <option value="{{$brands->title}}">{{$brands->title}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select class="form-control select2" name="category" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            @foreach($category as $categories)
                                            <option value="{{$categories->name}}">{{$categories->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Product Unit *</label>
                                        <select class="form-control select2" name="product_unit" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            @foreach($unit as $units)
                                            <option value="{{$units->unit_name}}">{{$units->unit_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sale Unit</label>
                                        <select class="form-control select2" name="sale_unit" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            @foreach($unit as $units)
                                            <option value="{{$units->unit_name}}">{{$units->unit_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Purchase Unit</label>
                                        <select class="form-control select2" name="purchase_unit" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            @foreach($unit as $units)
                                            <option value="{{$units->unit_name}}">{{$units->unit_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Cost *</label>
                                        <input type="number" class="form-control" name="cost"
                                            id="exampleInputEmail1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Price *</label>
                                        <input type="number" class="form-control" name="price"
                                            id="exampleInputEmail1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Daily Sale Objective</label>
                                        <input type="number" class="form-control" name="dso"
                                            id="exampleInputEmail1" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alert Quantity</label>
                                        <input type="number" class="form-control" name="alert_qty"
                                            id="exampleInputEmail1" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Tax</label>
                                        <select class="form-control select2" name="product_tax" style="width: 100%;" required>
                                        @foreach($tax as $taxes)
                                            <option value="{{$taxes->name}}">{{$taxes->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tax Method</label>
                                        <select class="form-control select2" name="tax_method" style="width: 100%;" required>
                                            <option disabled>Choose...</option>
                                            <option value="1">Exclusive</option>
                                            <option value="2">Inclusive</option>
                                        </select>
                                        </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Product Details</label>
                                        <textarea rows="4" id="summernote" name="detail" placeholder="Enter Product Details">
                                            
                                          </textarea>
                                        </div>
                                   </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="customFile">Product Image</label>
                    
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile" name="image">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-md-12" id="warehousetableafter">
                                    <div class="form-group">
                                        <label>Initial Stock</label>
                                        <select class="form-control select2" name="initial_stock" style="width: 100%;" onchange="higherSelect(this)" required>
                                            <option disabled>Choose...</option>
                                            <option value="1">Available</option>
                                            <option value="2">Not Available</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="varSelect">
                                    <div class="form-group">
                                        <label for="variants">Product Variant</label>
                                        <select name="variant_available" id="variants" class="form-control" onchange="createnewvariant(this)">
                                            <option value="default" selected>No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>              

                                <div class="col-md-12" id="warehouseSelection">
                                    <div class="card card-grey">
                                        <div class="card-header">
                                        <h3 class="card-title">Warehouse</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body card-footer">
                                            <table class="table table-bordered d-block d-md-table" style="overflow-x: scroll;" id="dynamicTable">
                                                <thead>
                                                    <tr>
                                                        <th class="w-25">Warehouse</th>
                                                        <th class="w-50">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="wareBody">      
                                                    @foreach ($warehouse as $warehouses)
                                                    <tr>
                                                        <td><label>{{$warehouses->name}}</label><input type="hidden"  name="warehouses[]"  value="{{$warehouses->id}}" class="form-control" /></td>
                                                        </td>
                                                        <td><input type="number"  name="quantititiess[]" class="form-control warqty" /></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                              
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-default float-right">Cancel</button>
                          </div>
                          <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                    </form>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        
        <!-- /.content-wrapper -->
         <script>
            let count = 0;
let holder = [];
let variantDivs = {};
let calIndex=""
let arrTemp = [];
let colorArray = [];
let finalArray = [];
let current = [];
let productArr = [];
let val = "";
let cnt = 0;
let outerIndex='';
let result = "";

function higherSelect(thisbtn){
  if(thisbtn.value == "2"){
    document.getElementById("varSelect").style.display = "none";
    
    // hide warehouse table as well as empty it
    document.getElementById("warehouseSelection").style.display = "none";
    let totalcols = document.getElementById("wareBody").children.length;
    for(ik =0; ik<totalcols; ik++){
      document.getElementById("wareBody").children[ik].children[1].children[0].value= '' ;
    }
  }

  else{
    document.getElementById("varSelect").style.display = "block";
    document.getElementById("warehouseSelection").style.display = "block";
  }
}

function createnewvariant(val) {
  holder.push(0);
  if (val.value == "yes") {
    const firstvariant = document.createElement("div");
    firstvariant.className = "w-100";
    firstvariant.id = "destroythis";
    firstvariant.action = "#";
    firstvariant.innerHTML = `
        <div class="row m-0" id="va">
            <div class="col-12 p-0" id="makevariant">
                <div class="row m-0">
                    <div class="col-12 col-md-6 hasVariants">
                        <div class="form-group">
                            <label for="options">Product Option *</label>
                            <input type="text" name="options[]" id="prodOption.${holder[count]}" class="form-control " placeholder="Color, Size,..." required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 hasVariants">
                        <div class="form-group">
                            <label for="values">Product Value *</label>
                            <div id="prodbtns" class="rounded row  p-0 py-1 gap-2 countVariant" style="border: 1px solid #ced4da;">

                                <input type="text" maxlength="30" id="prodValue.${holder[count]}" class="inputVal form-control border-0 col mx-auto"  style=" max-height: 30px; " onkeyup="checkComma(event, this)" placeholder="Enter variant separated by comma">
                        <input type="hidden" name="values[]" id="prodValue.${holder[count]}.${holder[count]}" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 mb-4 hasVariants">
                <button type="button" class="btn btn-primary" onclick="addnewvariants()"><i class="fa fa-plus"></i>&emsp; Add more variants</button>
            </div>
        </div>

        <div class="col-12 hasVariants">
            <table class="table table-hover d-block d-sm-table" style="overflow-x: auto;">
                <thead class="table-active">
                    <tr>
                        <th>Name</th>
                        <th class="text-nowrap">SKU</th>
                        <th>Quantity</th>
                        <th>Warehouse</th>
                        <th>Variation Prices</th>
                    </tr>
                </thead>
                <tbody id="valueInsertion">
                    
                </tbody>
            </table>
        </div>
        `;
    document.getElementById("varSelect").append(firstvariant); 
    document.getElementById("warehouseSelection").style.display = "none";
    let totalcols = document.getElementById("wareBody").children.length;
    for(ik =0; ik<totalcols; ik++){
      document.getElementById("wareBody").children[ik].children[1].children[0].value= '' ;
    }
    let name = "div" + `${holder[count]}`;
    variantDivs[name] = [];
    count++;
    const va = document.getElementById("va");
    createdfirstVariant();
  }
   else {
    document.getElementById("warehouseSelection").style.display = "block";
    document.getElementById("destroythis").remove();
    count = 0;
  }
}

// Adding Warehouses

(function warehousedetails() {
  let totalcols = document.getElementById("wareBody").children.length;
  const warehouses = document.createElement("div");
  warehouses.className = "row mt-2";
  for (let ik = 0; ik < totalcols; ik++) {
    let takevals = document.getElementById("wareBody").children[ik].children[0].children[0].innerText;
    warehouses.innerHTML += `
                    <div class='col-12 col-md-3'>
                        <div class='card py-2 px-3' style='background-color: transparent;'>
                            <div>
                                <h6 style='display:inline-block;'><strong>${takevals} :&emsp;</strong></h6>
                                <span style='display:inline-block;'>54</span>
                            </div>
                        </div>
                    </div>
                    `;
  }
  document.getElementById("wareBody").parentElement.parentElement.appendChild(warehouses);
})();

// Adding New Variants

function addnewvariants() {
  let checker = variantDivs[`div${count - 1}`]; 
  // console.log(`div${count - 1} name here ${checker}`);
  if(checker.length === 0){
      alert("Enter values in previous field first.");
      return;
  }
  holder.push(count);

      const newvariant = document.createElement("div");
      newvariant.className = "col-12 p-0";
      newvariant.innerHTML = `
        <div class="row m-0">
            <div class="col-12 col-md-6 hasVariants">
                <div class="form-group">
                    <label for="options">Product Option *</label>
                    <input type="text" name="options[]" id="prodOption.${holder[count]}" class="form-control" placeholder="Color, Size,..." required>
                </div>
            </div>

            <div class="col-12 col-md-6 hasVariants">
                <div class="form-group">
                    <label for="values">Product Value *</label>
                    <div id="prodbtns" class=" rounded row p-0 pt-1 gap-2 countVariant"  style="border: 1px solid #ced4da;">

                        <input type="text" maxlength="30" id="prodValue.${holder[count]}"  style=" max-height: 30px;" onkeyup="checkComma(event, this)" class="inputVal form-control border-0 col mx-auto" placeholder="Enter variant separated by comma" >
                        <input type="hidden" name="values[]" id="prodValue.${holder[count]}.${holder[count]}" value="">
                    </div>
                </div>
            </div>
        </div>
        `;
      document.getElementById("makevariant").appendChild(newvariant);

      // Dynamically creating arrays as variants are created
      let name = "div" + `${holder[count]}`;
      variantDivs[name] = [];
      count++;
}

let valuebtn = document.getElementsByClassName("valuebtn");
let prodoptiontag = document.getElementById("prodOption${holder[count]}");
let prodvaluetaginner = document.getElementById(`prodValue${holder[count]}`);

// Add button of variants
function checkComma(e, btn) {
  if (e.keyCode == 188 || e.keyCode == 13) {
    if (btn.value == "" || btn.value == "," || btn.value == " ") {
      return;
    }
    if (e.keyCode == 188) {
      result = btn.value.slice(0, -1);
    } else {
      result = btn.value;
    }
    if (result.startsWith("<")) {
      return;
    }

    // Adding values directly to respected dynamically created arrays as soon as they are inserted by user.
    let name = "div" + `${btn.id.slice(-1)}`;
    for (let looper = 0; looper < variantDivs[name].length; looper++) {
      if (variantDivs[name][looper] == result) {
        btn.style.color = "red"; 
        return;
      }
    }
  }
}

if (valuebtn.length >= 3) {
  prodvaluetaginner.classList.remove("col");
  prodvaluetaginner.classList.add("col-12");
}

function createdfirstVariant() {


  va.addEventListener("input", function (event) {
    const inputVal = event.target;
    if (inputVal.classList.contains("inputVal")) {
      const value = inputVal.value.trim();
      const enteredValue = value.charAt(value.length - 1);

      if (enteredValue === "," || event.inputType === "insertLineBreak") {
        const index = Array.from(va.getElementsByClassName("inputVal")).indexOf(
          inputVal
        );
        if (
          inputVal.classList.contains("inputVal") &&
          event.target.value.includes("<") || event.target.value.includes(" ")
        ) {
          return;
        }
        let newVal = value.substring(0,value.length-1).trim();
        let checkDupicate = deleteDuplicate(index, newVal);
        if(checkDupicate == false){
          return;
        }
        else{
          
        ArrayAppend(index, value.substring(0, value.length - 1).trim());
        inputVal.value = newVal;
        createInnerBtns(inputVal);
        inputVal.value = "";
        }
      }
    }
  });

  va.addEventListener("keydown", function (event) {
    const inputVal = event.target;
    if (inputVal.classList.contains("inputVal") && event.key === "Enter") {
      const value = inputVal.value.trim();
      const index = Array.from(va.getElementsByClassName("inputVal")).indexOf(
        inputVal
      );
      if (
        inputVal.classList.contains("inputVal") &&
        event.target.value.includes("<") || event.target.value.includes(" ")
      ) {
        return;
      }
      let checkDupicate = deleteDuplicate(index, value);
      if(checkDupicate == false){
        return;
      }
      else{
        
      ArrayAppend(index, value);
      createInnerBtns(inputVal);
      }
    }
  });


  va.addEventListener("click", function (event) {
    const inputVal = event.target;
  
 
    if (inputVal.classList.contains("del")) {
      const index = Array.from(va.getElementsByClassName("del")).indexOf(
        inputVal
      );
      outerIndex=index;
    }
    if (inputVal.classList.contains("inputVal")) {
      if (event.target.value.includes(",")) {
        const index = Array.from(va.getElementsByClassName("inputVal")).indexOf(
          inputVal
        );
        const value = inputVal.value
          .substring(0, inputVal.value.indexOf(","))
          .trim();
        let checkDuplicate = deleteDuplicate(index, value);
        if (!checkDuplicate) {
          return;
        } else {
          ArrayAppend(index, value);
          inputVal.value = inputVal.value
            .substring(inputVal.value.indexOf(",") + 1)
            .trim();
          createInnerBtns(inputVal);
        }
      }
  
      if (event.target.value.includes(" ")) {
     
        return;
      }
    }
  });
  

  // va.addEventListener("click", function (event) {
  //   const inputVal = event.target;
  //   if (
  //     inputVal.classList.contains("inputVal") &&
  //     event.target.value.includes(",")
  //   ) {
  //     const index = Array.from(va.getElementsByClassName("inputVal")).indexOf(
  //       inputVal
  //     );
  //     const value = inputVal.value
  //       .substring(0, inputVal.value.indexOf(","))
  //       .trim();
  //     let checkDupicate = deleteDuplicate(index, value);
  //     if(checkDupicate == false){
  //       return;
  //     }
  //     else{
        
  //       ArrayAppend(index, value);
  //       inputVal.value = inputVal.value
  //         .substring(inputVal.value.indexOf(",") + 1)
  //         .trim();
  //       createInnerBtns(inputVal);
  //     }
  //   }
  //   if (
  //     inputVal.classList.contains("inputVal") &&
  //      event.target.value.includes(" ")
  //   ) {
  //     return;
  //   }
  



  // });
}


function ArrayAppend(index, value) {
  let resultFinal = value;
  if (cnt > index) {
    if (index === 0) {
      variantDivs[`div${index}`].push(resultFinal);
      colorArray.push(resultFinal);
      updateWholeArray();
      getOnlyWantedElements();
    emptyValuesInTable();
    inputValuesInTable();

    } else if (index > 0) {
      variantDivs[`div${index}`].push(resultFinal);
      addNewItem(index - 1, resultFinal);
    }
  } else if (cnt <= index) {
    if (index === 0) {
      variantDivs[`div${index}`].push(resultFinal);
      let existingValue = colorArray[0];
      if (existingValue) {
        colorArray[0] = resultFinal;
      } else {
        colorArray.push(resultFinal);
        // write here
      emptyValuesInTable();
      inputValuesInTable();

      }
      cnt++;
    } else {
      if (index == 1) {
      variantDivs[`div${index}`].push(resultFinal);
        val += `/${resultFinal}`;
        arrTemp.push(val);
      } else if (index > 1) {
        createArrayForAppend(index, resultFinal);
      }
      cnt++;
      updateWholeArray();
      getOnlyWantedElements();

      emptyValuesInTable();
      inputValuesInTable();

    }
  }
  let newName = "div" + `${cnt-1}`;
  document.getElementById(`prodValue.${(cnt-1)}.${(cnt-1)}`).value = ``;
  for(let ki=0; ki<variantDivs[newName].length;ki++){
      document.getElementById(`prodValue.${(cnt-1)}.${(cnt-1)}`).value += `${variantDivs[newName][ki]},`;
  }
}

function updateWholeArray() {
  let newVariantArray = [];
  for (let i = 0; i < colorArray.length; i++) {
    for (let j = 0; j < arrTemp.length; j++) {
      let variant = colorArray[i] + arrTemp[j];
      newVariantArray.push(variant);
    }
  }
  finalArray = newVariantArray;

}

function addNewItem(index, resultFinal) {
  let temp2 = new Set();
  arrTemp.forEach((item) => {
    let result = item.split("/").map((part) => part.trim());
    if (result[0] === "") {
      result.shift();
    }

    if (result[index]) {
      result[index] = resultFinal;
      let newValue = `/${result.join("/")}`;
      temp2.add(newValue);
    } else if (!index) {
      result.push(resultFinal);
      let newValue = `/${result.join("/")}`;
      temp2.add(newValue);
    }
  });

  arrTemp = [...arrTemp, ...Array.from(temp2)];

  updateWholeArray();
  getOnlyWantedElements();
  
  emptyValuesInTable();
  inputValuesInTable();
}

function createArrayForAppend(index, currentVal) {
  let prevArrVal = new Set();

  arrTemp = Array.from(new Set(arrTemp));

  arrTemp.map((ele) => {
    let outCome = ele.split("/").map((part) => part.trim());
    outCome.shift();

    if (outCome.length === index - 1) {
      outCome.push(currentVal);
      const finalOut = `/${outCome.join("/")}`;
      prevArrVal.add(finalOut);
    }
  });

  arrTemp = [...arrTemp, ...Array.from(prevArrVal)];
}

function getOnlyWantedElements() {
  let tempProductArray = [];
  finalArray.map((items) => {
    let splited = items.split("/");
    if (splited.length == cnt) {
      tempProductArray.push(splited.join("/"));
    }
  });
  productArr = tempProductArray;
  tempProductArray=null;
}

function createInnerBtns(inputVal) {
  const variantAddBtn = document.createElement("a");
  variantAddBtn.className =
    "btn btn-info col-auto text-nowrap valuebtn mx-1 row m-0 p-0 mb-1 del";
  variantAddBtn.href = "javascript:void(0)";
  variantAddBtn.style = "max-width: fit-content; color:white;";
  variantAddBtn.innerHTML =
    '<span class=" variantvalue col m-0 p-0" style="padding-left:5px !imporatnt;">&nbsp;' +
    inputVal.value +
    '</span><i class="fa fa-times col-auto" style="font-size: 0.8em; color:white; cursor:pointer;" onclick="destroybtn(this)"></i>';
  inputVal.parentElement.insertBefore(variantAddBtn, inputVal);
  inputVal.value = "";
}

function destroybtn(btn) {
  let sibling = btn.parentElement.nextElementSibling;
while (sibling.nextElementSibling) {
  sibling = sibling.nextElementSibling;
}
let indexing = sibling.id.split('.');
indexing.shift();
indexing=Number(indexing)
const deletedValue = btn.previousSibling.textContent.trim();
btn.parentElement.remove();
deletingFinal(indexing,deletedValue);
emptyValuesInTable();
inputValuesInTable();

}

function deletingFinal(inde, deletedValue) {
  let newArray = [];

//   let newly= variantDivs.div`inde`.filter((items)=>{
//     if(items!=deletedValue){
 
//      return items;
//     }
//    });
//  variantDivs.div`inde`=newly;
  
  if (inde === 0 && Array.isArray(colorArray)) {
    colorArray.forEach((item) => {
      if (item !== deletedValue) {
        newArray.push(item);
      }
    });
    colorArray = newArray;
  } else{
    arrTemp.forEach((item) => {
      let splitedOut = item.split('/');
      splitedOut.shift();
      if (splitedOut[inde - 1] === deletedValue) {
          } else {
            newArray.push(item);
          }
    });
    arrTemp = newArray;
    newArray=null;
    
  }

  updateWholeArray();
  getOnlyWantedElements();
}


function deleteDuplicate(index, vali) {
  let returningVal = true;

  if (index === 0) {
    colorArray.map((data) => {
      if (data === vali) {
        returningVal = false;
      }
    });
  } else {
    productArr.map((data) => {
      let res = data.split('/');
      if (res[index] === vali) {
        returningVal = false;
      }
    });
  }

  return returningVal;
}

function inputValuesInTable(){
  let body = document.getElementById('valueInsertion');
  if(productArr.length != 0){
    for(let ki=0;ki<productArr.length;ki++){
      const newrow = document.createElement('tr');
      newrow.innerHTML=`
        <td>
          <input type="text" name="variation_names[]" id="varname" class="form-control" value="${productArr[ki]}" readonly>
        </td>
        <td>
          <input type="text" name="skus[]" id="varitemcode" class="form-control" value="${productArr[ki]}-">
        </td>
        <td>
          <input type="number" name="varqtities[]" id="varqty" class="form-control">
        </td>
        <td><span class="varwarehouse"></span>
          <select name="varwarehouses[]" id="varwarehouses" class="form-control">
          @foreach ($warehouse as $warehouses)
              <option value="{{$warehouses->name}}">{{$warehouses->name}}</option>
          @endforeach
          </select>
        </td>
        <td>
          <input type="number" name="variation_prices[]" id="variation_prices" class="form-control">
        </td>
      `;
      body.appendChild(newrow);
    }
  }
  else if(productArr.length == 0){
    for(let ki=0;ki<colorArray.length;ki++){
      const newrow = document.createElement('tr');
      newrow.innerHTML=`
        <td>
          <input type="text" name="variation_names[]" id="varname" class="form-control" value="${colorArray[ki]}" readonly>
        </td>
        <td>
          <input type="text" name="skus[]" id="varitemcode" class="form-control" value="${colorArray[ki]}-">
        </td>
        <td>
          <input type="number" name="varqtities[]" id="varqty" class="form-control">
        </td>
        <td><span class="varwarehouse"></span>
          <select  name="varwarehouses[]" id="varwarehouses" class="form-control">
          @foreach ($warehouse as $warehouses)
          <option value="{{$warehouses->name}}">{{$warehouses->name}}</option>
      @endforeach
          </select>
        </td>
        <td>
          <input type="number" name="variation_prices[]" id="variation_prices" class="form-control">
        </td>
      `;
      body.appendChild(newrow);
    }
  }
  
}


function emptyValuesInTable(){
  let body = document.getElementById('valueInsertion');
  for(ri=0;ri<body.children.length;ri++){
    body.innerHTML = "";
  }
}
         </script>

        @include('client.component.page-footer')