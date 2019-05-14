class OrderMailer < ApplicationMailer
  def notify_order_placed(order)
    @order       = order
    @user        = order.user
    @product_lists = @order.product_lists

    mail(to: @user.email , subject: "[Nsysuccc] 感謝你完成訂單,以下是訂單明細 #{order.token}")
  end
end
