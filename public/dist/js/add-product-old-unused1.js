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

function createnewvariant(val) {
  holder.push(0);
  if (val.value == "yes") {
    const firstvariant = document.createElement("form");
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

                                <input type="text" maxlength="30" name="values[]" id="prodValue.${holder[count]}" class="inputVal form-control border-0 col mx-auto"  style=" max-height: 30px; " onkeyup="checkComma(event, this)" placeholder="Enter variant separated by comma" required>
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
                    </tr>
                </thead>
                <tbody id="valueInsertion">
                    
                </tbody>
            </table>
        </div>
        `;
    document.getElementById("varSelect").append(firstvariant); 
    document.getElementById("warehouseSelection").style.display = "none";
    document.getElementById("wareBody").innerHTML = "";
    let name = "div" + `${holder[count]}`;
    variantDivs[name] = [];
    count++;
    const va = document.getElementById("va");
    createdfirstVariant();
  } else {
    document.getElementById("warehouseSelection").style.display = "block";
    document.getElementById("wareBody").innerHTML = `
    <tr>
    <td><select name="types[]" id="type_0_name" class="form-control type type0" data-index="0">
            <option value="">-- Choose warehouse --</option>
            @foreach ($type as $types)
            <option value="{{ $types->id}}">{{ $types->name }}</option>
            @endforeach
        </select>
    </td>
    <td><input type="number" id="qty' + i + '" name="qty[]" class="form-control" /></td>
    <td>
        <button type="button" class="pull-right btn btn-danger rounded-circle">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
    `;
    document.getElementById("destroythis").remove();
    // warehousedetails();
    count = 0;
  }
}

// Adding Warehouses

// (function warehousedetails() {
//   let totalcols = document.getElementById("type_0_name").length;
//   const warehouses = document.createElement("div");
//   warehouses.className = "row mt-4";
//   for (let i = 1; i < totalcols; i++) {
//     let takevals = document.getElementById("type_0_name").options[i].text;
//     warehouses.innerHTML += `
//                     <div class='col-12 col-md-3'>
//                         <div class='card py-2 px-3' style='background-color: transparent;'>
//                             <div>
//                                 <h6 style='display:inline-block;'><strong>${takevals} :&emsp;</strong></h6>
//                                 <span style='display:inline-block;'>54</span>
//                             </div>
//                         </div>
//                     </div>
//                     `;
//   }
//   let after = document
//     .getElementById("warehousenames")
//     .parentElement.appendChild(warehouses);
// })();

// Adding New Variants

function addnewvariants() {
  holder.push(count);
  let make = document.getElementById("makevariant");
  const newvariant = document.createElement("div");
  newvariant.className = "col-12 p-0";
  newvariant.innerHTML = `
    <div class="row m-0">
        <div class="col-12 col-md-6 hasVariants">
            <div class="form-group">
                <label for="prodOption">Product Option *</label>
                <input type="text" name="prodOption" id="prodOption.${holder[count]}" class="form-control" placeholder="Color, Size,..." required>
            </div>
        </div>

        <div class="col-12 col-md-6 hasVariants">
            <div class="form-group">
                <label for="prodValue">Product Value *</label>
                <div id="prodbtns" class=" rounded row p-0 pt-1 gap-2 countVariant"  style="border: 1px solid #ced4da;">

                    <input type="text" maxlength="30" name="prodValue" id="prodValue.${holder[count]}"  style=" max-height: 30px;" onkeyup="checkComma(event, this)" class="inputVal form-control border-0 col mx-auto" placeholder="Enter variant separated by comma" required>
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
        if(checkDupicate === false){
          inputVal.style.color="red"
          return;
        }
        else{
          inputVal.style.color="black"  
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
      if(checkDupicate === false){
        inputVal.style.color="red"
        return;
      }
      else{
        
      inputVal.style.color="black"
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
        if(checkDuplicate === false){
          inputVal.style.color="red"
          return;
        } else {
          inputVal.style.color="black"

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
console.log(`deleted itm index of ${inde} and deleted value i ${deletedValue} and outer index is${outerIndex} `)
let newly= variantDivs[`div${inde}`].filter((items)=>{
  if(items!=deletedValue){

   return items;
  }
 });
 variantDivs[`div${inde}`]=newly;
 console.log( variantDivs[`div${inde}`])
  let newArray = [];
  
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
      console.log(data);
      let res = data.split('/');
      if (res[index] === vali) {
        returningVal = false;
      }
    });
  }

  return returningVal;
}

function inputValuesInTable(){
  // console.log(variantDivs);
  // console.log(productArr);
  let body = document.getElementById('valueInsertion');
  if(productArr.length != 0){
    for(let ki=0;ki<productArr.length;ki++){
      const newrow = document.createElement('tr');
      newrow.innerHTML=`
        <td>
          <input type="text" name="varname" id="varname" class="form-control" value="${productArr[ki]}" disabled>
        </td>
        <td>
          <input type="text" name="varitemcode" id="varitemcode" class="form-control" value="${productArr[ki]}-">
        </td>
        <td>
          <input type="number" name="varqty" id="varqty" class="form-control">
        </td>
        <td><span class="varwarehouse"></span>
          <select name="varwarehouse" id="varwarehouse" class="form-control">
              <option value="war1" selected>Warehouse 1</option>
              <option value="war2">Warehouse 1</option>
          </select>
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
          <input type="text" name="varname" id="varname" class="form-control" value="${colorArray[ki]}" disabled>
        </td>
        <td>
          <input type="text" name="varitemcode" id="varitemcode" class="form-control" value="${colorArray[ki]}-">
        </td>
        <td>
          <input type="number" name="varqty" id="varqty" class="form-control">
        </td>
        <td><span class="varwarehouse"></span>
          <select name="varwarehouse" id="varwarehouse" class="form-control">
              <option value="war1" selected>Warehouse 1</option>
              <option value="war2">Warehouse 1</option>
          </select>
        </td>
      `;
      body.appendChild(newrow);
      // console.log(colorArray[ki]);
    }
  }
  
}


function emptyValuesInTable(){
  let body = document.getElementById('valueInsertion');
  for(ri=0;ri<body.children.length;ri++){
    body.innerHTML = "";
  }
}