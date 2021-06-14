function decreaseQuantity(productId, porcjaId) {

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'zmniejszIlosc.php';
  

        const hiddenProduct = document.createElement('input');
        hiddenProduct.type = 'hidden';
        hiddenProduct.name = 'productId';
        hiddenProduct.value = productId;
  
        form.appendChild(hiddenProduct);

        const hiddenPorcja = document.createElement('input');
        hiddenPorcja.type = 'hidden';
        hiddenPorcja.name = 'porcjaId';
        hiddenPorcja.value = porcjaId;
  
        form.appendChild(hiddenPorcja);
      

  
    document.body.appendChild(form);
    form.submit();
  }

  function increaseQuantity(productId, porcjaId) {

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'zwiekszIlosc.php';
  

        const hiddenProduct = document.createElement('input');
        hiddenProduct.type = 'hidden';
        hiddenProduct.name = 'productId';
        hiddenProduct.value = productId;
  
        form.appendChild(hiddenProduct);

        const hiddenPorcja = document.createElement('input');
        hiddenPorcja.type = 'hidden';
        hiddenPorcja.name = 'porcjaId';
        hiddenPorcja.value = porcjaId;
  
        form.appendChild(hiddenPorcja);
      

  
    document.body.appendChild(form);
    form.submit();
  }

  function changePortion(productId, porcjaId) {

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'zmienPorcje.php';
  

        const hiddenProduct = document.createElement('input');
        hiddenProduct.type = 'hidden';
        hiddenProduct.name = 'productId';
        hiddenProduct.value = productId;
  
        form.appendChild(hiddenProduct);

        const hiddenPorcja = document.createElement('input');
        hiddenPorcja.type = 'hidden';
        hiddenPorcja.name = 'porcjaId';
        hiddenPorcja.value = porcjaId;
  
        form.appendChild(hiddenPorcja);

        var nowaPorcja = document.getElementById('porcja-' + productId + '-' + porcjaId)

        const hiddenNowaPorcja = document.createElement('input');
        hiddenNowaPorcja.type = 'hidden';
        hiddenNowaPorcja.name = 'nowaPorcjaId';
        hiddenNowaPorcja.value = nowaPorcja.value;
  
        form.appendChild(hiddenNowaPorcja);
      

  
    document.body.appendChild(form);
    form.submit();
  }

  function deleteRow(productId, porcjaId) {

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'usun.php';
  

        const hiddenProduct = document.createElement('input');
        hiddenProduct.type = 'hidden';
        hiddenProduct.name = 'productId';
        hiddenProduct.value = productId;
  
        form.appendChild(hiddenProduct);

        const hiddenPorcja = document.createElement('input');
        hiddenPorcja.type = 'hidden';
        hiddenPorcja.name = 'porcjaId';
        hiddenPorcja.value = porcjaId;
  
        form.appendChild(hiddenPorcja);
      

  
    document.body.appendChild(form);
    form.submit();
  }

  function clearCart() {

    const form = document.createElement('form');
    form.method = 'post';
    form.action = 'czyscKoszyk.php';
  

        
      

  
    document.body.appendChild(form);
    form.submit();
  }