<%-- 
    Document   : order
    Created on : 05 Oct 2018, 9:16:07 PM
    Author     : Pagez
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%@ page import="java.util.*"%>
<%@ page import="java.text.*"%>
<%@ page import="javax.servlet.*"%>
<%@ page import="javax.servlet.http.*"%>
<%@ page import="bean.CartBean" %>
<%@ page import="bean.OrderBean" %>
<%@ page import="bean.UserBean" %>
<%@ page import="bean.ShippingBean" %>
<%@ page import="bean.Clients" %>


<%
    CartBean c = new CartBean();
    if(session.getAttribute("cart") != null) c = (CartBean)session.getAttribute("cart");
    OrderBean o = new OrderBean();
    o.setFirstName(request.getParameter("firstname"));
    o.setLastName(request.getParameter("lastname"));
    o.setAddress(request.getParameter("address1") + " - " +request.getParameter("address2") + ", " + request.getParameter("city") + " - " + request.getParameter("state") + ", " + request.getParameter("country") + ", " + request.getParameter("zipcode"));
    o.setCardName(request.getParameter("nameprinted"));
    o.setCardNumber(request.getParameter("cardnumber"));
    o.setDate(request.getParameter("expiration"));
    o.setCvc(request.getParameter("cvc"));
    o.setProducts(c.getProducts());
    UserBean u = new UserBean();
    if(session.getAttribute("user") != null) u = (User)session.getAttribute("user");
%>

<html>
    <body>
        <aside>
            <% Date date = new Date(); %>
            <h1 align="center">Confirmation Page</h1>
            <h3><%= u.getId() %>, thank you for you purchase on <%= date %>!</h3>
            <%
                o.setPurchaseDate(date);
                String orderstring = o.toString();
            %>
            <p><%= orderstring %>
            <%
                Set set = c.getProducts().entrySet();
                Iterator i = set.iterator();
                String prod;
                Integer count;
                while(i.hasNext()) {
                   Map.Entry me = (Map.Entry)i.next();
                   prod = (String)me.getKey();
                   count = (Integer)me.getValue();
            %>
                    <br>* <%= prod %> - <%= count %>
            <%
                    }
                Calendar calendar = Calendar.getInstance();
                calendar.add(Calendar.DAY_OF_MONTH, 14);
                date = calendar.getTime();
                o.setDeliveryDate(date);
                SimpleDateFormat s = new SimpleDateFormat("MM/dd/yy");
            %>
                    <br><br>Delivery Date: <%= s.format(date) %>
            </p>
            <%
                int days = 5;
                for(int j = 0; j < days;){
                   calendar.add(Calendar.DAY_OF_MONTH, -1);
                   if(calendar.get(Calendar.DAY_OF_WEEK) <= 6 && calendar.get(Calendar.DAY_OF_WEEK) >= 2)
                      j++;
                }
                date = calendar.getTime();
                o.setCancellationDate(date);
            %>
            <form action="welcome.jsp">
                <input type="submit" value="OK">
            </form>
            <%
                c = new Cart();
                session.setAttribute("cart", c);
            %>
        </aside>
    </body>
<%
    u.setOrder(o);
    Clients clients = new Clients();
    clients.setNewClient(u);
    session.setAttribute("user", u);
    clients.serializeThis();
%>

<%-- Show the header with the shopping cart image --%>
<table border="0">
<tr><td><img src="cart4.png"><td><h1>Shopping Cart</h1>
</table>

<%
// Get the current shopping cart from the user's session.
    ShoppingCart cart = (ShoppingCart) session.getAttribute("ShoppingCart");

// If the user doesn't have a shopping cart yet, create one.
    if (cart == null)
    {
        cart = new ShoppingCart();
        session.setAttribute("ShoppingCart", cart);
    }

// Get the items from the cart.
    Vector items = cart.getItems();

// If there are no items, tell the user that the cart is empty.
    if (items.size() == 0)
    {
        out.println("<h3>Your shopping cart is empty.</h3>");
    }
    else
    {
%>
<%-- Display the header for the shopping cart table --%>
<br>
<table border=4>
<tr><th>Description</th><th>Quantity</th><th>Price</th></tr>
<%

        int numItems = items.size();

// Get a formatter to write out currency values.
        NumberFormat currency = NumberFormat.getCurrencyInstance();

        for (int i=0; i < numItems; i++)
        {
            Item item = (Item) items.elementAt(i);

// Print the table row for the item.
            out.print("<tr><td>");
            out.print(item.description);
            out.print("</td><td>");
            out.print(item.quantity);
            out.print("</td><td>");
            out.print(currency.format(item.price));

// Print out a link that allows the user to delete an item from the cart.
            out.println("</td><td>"+
                "<a href=\"/shoppingcart/RemoveItemServlet?item="+
                i+"\">Remove</a></td></tr>");
        }
    }
%>
</table>
<html>