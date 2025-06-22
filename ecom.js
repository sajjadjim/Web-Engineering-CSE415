   document.querySelectorAll('.card').forEach(card => {
      const price = parseFloat(card.dataset.price);
      const discount = parseFloat(card.dataset.discount);
      const originalPriceElem = card.querySelector('.original-price');
      const discountInfoElem = card.querySelector('.discount-info');
      const discountedPriceElem = card.querySelector('.discounted-price');
      if (discount > 0) {
        const discountPercent = Math.round(discount * 100);
        const discountedPrice = Math.round(price * (1 - discount));
        discountInfoElem.textContent = `Discount: ${discountPercent}% OFF`;
        discountedPriceElem.textContent = `Now: ${discountedPrice} Taka`;
        originalPriceElem.style.textDecoration = "line-through";
        originalPriceElem.style.color = "#888";
        discountedPriceElem.style.color = "#e67e22";
        discountedPriceElem.style.fontWeight = "bold";
      } else {
        discountInfoElem.textContent = '';
        discountedPriceElem.textContent = '';
        originalPriceElem.style.textDecoration = "none";
        originalPriceElem.style.color = "";
      }
    });
