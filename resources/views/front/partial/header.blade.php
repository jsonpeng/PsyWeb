    <!--.头部-->
<div class="wrap-b header-b">
    <div class="wrap header clearfix">
        <div class="logo fl clearfix">
            <!--<a href="https://www.fh21.com.cn" class="fl"><img src="http://static2.fh21.com.cn/chl/images/logo-fh.png" class="fl"></a>-->
            <a href="/" class="fl"><span class="fl logo-word" style="width:auto;">小小白</span></a>
        </div>
        <div class="nav fl clearfix">
      
            @foreach($menus as $menu)
                    <!--如果还有子分类 -->
                    @if($menu->children->count())
                         <div class="fl nav-list " >
                            <a href="#" class="clearfix nav-list-head">
                                <span class="nav-list-head-word">{!! $menu->name !!}</span>
                                <i class="icon icon-header-down"></i>               
                            </a>
                            <div class="nav-list-show">
                            @foreach ($menu->children as $child)
                                 @if(!empty($child->children))
                                    <a href="{!! $child->link !!}" class="nav-list-show-list a-hover">{!! $child->name !!}</a>
                                 @else
                                 @endif
                            @endforeach
                            </div>
                        </div>
                    @else
                     <!--如果没有子分类 -->
                           <div class="fl nav-list">
                            <a href="{!! $menu->link !!}" class="clearfix nav-list-head">
                                <span class="nav-list-head-word">{!! $menu->name !!}</span>
                            </a>
                        </div>
                    @endif

            @endforeach
            <!--
            <div class="fl nav-list">
                <a href="/" class="clearfix nav-list-head">
                    <span class="nav-list-head-word">首页</span>
                </a>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 心理探秘 </span>
                                    </a>
                <div class="nav-list-show">
                                </div>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 成长心理 </span>
                    <i class="icon icon-header-down"></i>               </a>
                <div class="nav-list-show">
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">早恋</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">成长烦恼</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">心理引导</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">青少年心理</a>
                                </div>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 婚恋心理 </span>
                    <i class="icon icon-header-down"></i>               </a>
                <div class="nav-list-show">
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">恋爱心理</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">结婚心理</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">同性心理</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">单身一族</a>
                                </div>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 职场心理 </span>
                    <i class="icon icon-header-down"></i>               </a>
                <div class="nav-list-show">
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">职场压力</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">求职宝典</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">心理调整</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">职场感悟</a>
                                </div>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 人际关系 </span>
                    <i class="icon icon-header-down"></i>               </a>
                <div class="nav-list-show">
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">异性交往</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">朋友相处</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">同事来往</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">社交礼仪</a>
                                </div>
            </div>
                        <div class="fl nav-list ">
                <a href="/cat/xiao-xiao-bai" class="clearfix nav-list-head">
                    <span class="nav-list-head-word"> 心理测试 </span>
                    <i class="icon icon-header-down"></i>               </a>
                <div class="nav-list-show">
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">性格测试</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">爱情测试</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">职场测试</a>
                                    <a href="/cat/xiao-xiao-bai" class="nav-list-show-list a-hover">社交测试</a>
                                </div>
            </div>
            
                        <div class="fl nav-list nav-list-last">
                <a class="clearfix nav-list-head">       
                    <span class="nav-list-head-word">更多</span>                
                    <i class="icon icon-header-down"></i>                       
                </a>  
                <div class="nav-more">
                                   <div class="nav-morebox-wrap clearfix">
                        <a href="/cat/xiao-xiao-bai" class="fl nav-mw-left a-hover">星座趣闻</a>
                                           </div> 
                                </div>
            </div>
                -->


        </div>
    
        <!-- 公共头部右侧导航开始 -->
<div class="rightnav fr">
    <div class="clearfix rightnav-title clearfix">
        <i class="icon icon-nav fl"></i>
        <span class="fl rightnav-title-word">导航</span>
    </div>
    <div class="rightnav-more clearfix">
        <div class="rightnav-more-ls fl">
            <div class="rightnav-more-ls-title clearfix">
                <i class="icon icon-header-rm icon-header-rm1 fl"></i>
                <span class="fl">问诊</span>
            </div>
            <ul class="rightnav-more-main">
                <li class="rightnav-more-main-ls clearfix">
                                         <a href="http://yyk.fh21.com.cn/" target="_blank" class="a-hover fl">找医院</a>
                                          <a href="http://zjk.fh21.com.cn/" target="_blank" class="a-hover fl">找专家</a>
                                          <a href="https://www.fh21.com.cn/jibing.html" target="_blank" class="a-hover fl">查疾病</a>
                </li>
                <li class="rightnav-more-main-ls clearfix">
                                          <a href="https://v.fh21.com.cn/" target="_blank" class="a-hover fl">看微视</a>
                                          <a href="https://iask.fh21.com.cn/" target="_blank" class="a-hover fl">问医生</a>
                                          <a href="http://myzx.fh21.com.cn/" target="_blank" class="a-hover fl">名医义诊</a>
                                     </li>
            </ul>
        </div>
        <div class="rightnav-more-ls rightnav-more-ls-long fl">
            <div class="rightnav-more-ls-title clearfix">
                <i class="icon icon-header-rm icon-header-rm2 fl"></i>
                <span class="fl">助手</span>
            </div>
            <ul class="rightnav-more-main">
                <li class="rightnav-more-main-ls clearfix">
                                         <a href="http://dise.fh21.com.cn/" target="_blank" class="a-hover fl">疾病百科</a>
                                          <a href="http://zzk.fh21.com.cn/" target="_blank" class="a-hover fl">症状自查</a>
                                          <a href="http://test.fh21.com.cn/" target="_blank" class="a-hover fl">健康自测</a>
                                          <a href="http://dise.fh21.com.cn/share/" target="_blank" class="a-hover fl">健康经验</a>
                </li>
                <li class="rightnav-more-main-ls clearfix">
                                          <a href="http://ssk.fh21.com.cn/" target="_blank" class="a-hover fl">手术查询</a>
                                          <a href="http://hyk.fh21.com.cn/" target="_blank" class="a-hover fl">化验查询</a>
                                          <a href="http://ypk.fh21.com.cn/" target="_blank" class="a-hover fl">药品查询</a>
                                          <a href="http://yqk.fh21.com.cn/" target="_blank" class="a-hover fl">药企查询</a>
                                     </li>
            </ul>
        </div>
        <div class="rightnav-more-ls fl">
            <div class="rightnav-more-ls-title clearfix">
                <i class="icon icon-header-rm icon-header-rm3 fl"></i>
                <span class="fl">养生</span>
            </div>
            <ul class="rightnav-more-main">
                <li class="rightnav-more-main-ls clearfix">
                                         <a href="http://tcms.fh21.com.cn/" target="_blank" class="a-hover fl">中医</a>
                                          <a href="http://ys.fh21.com.cn/" target="_blank" class="a-hover fl">养生</a>
                                          <a href="http://care.fh21.com.cn/" target="_blank" class="a-hover fl">保健</a>
                </li>
                <li class="rightnav-more-main-ls clearfix">
                                          <a href="//" target="_blank" class="a-hover fl">心理</a>
                                          <a href="http://exam.fh21.com.cn/" target="_blank" class="a-hover fl">体检</a>
                                     </li>
            </ul>
        </div>
        <div class="rightnav-more-ls rightnav-more-ls-long fl">
            <div class="rightnav-more-ls-title clearfix">
                <i class="icon icon-header-rm icon-header-rm4 fl"></i>
                <span class="fl">资讯</span>
            </div>
            <ul class="rightnav-more-main">
                <li class="rightnav-more-main-ls clearfix">
                                         <a href="https://news.fh21.com.cn/" target="_blank" class="a-hover fl">新闻</a>
                                          <a href="https://zx.fh21.com.cn/" target="_blank" class="a-hover fl">医美</a>
                                          <a href="https://www.fh21.com.cn/meirong/" target="_blank" class="a-hover fl">整形</a>
                                          <a href="http://jianfei.fh21.com.cn/" target="_blank" class="a-hover fl">减肥</a>
                                          <a href="http://beauty.fh21.com.cn/" target="_blank" class="a-hover fl">美容</a>
                                          <a href="http://lady.fh21.com.cn/" target="_blank" class="a-hover fl">女性</a>
                </li>
                <li class="rightnav-more-main-ls clearfix">
                                          <a href="http://baby.fh21.com.cn/" target="_blank" class="a-hover fl">母婴</a>
                                          <a href="https://sex.fh21.com.cn/" target="_blank" class="a-hover fl">两性</a>
                                          <a href="http://pic.fh21.com.cn/" target="_blank" class="a-hover fl">图片</a>
                                     </li>
            </ul>
        </div>
    </div>
</div>
<!-- 公共头部右侧导航结束 -->
 
        <div class="fr head-login" id="state-login">
        <!--未登录-->
        <div class="head-tologin">
            <div class="head-tologin-head clearfix">
                <i class="icon icon-login-user fl"></i>
                <span class="fl head-tologin-word">登录</span>
            </div>
            <div class="head-tologin-show">
                <div class="head-tls-tips">
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="text" class="head-tls-inp fl" id="in-user" placeholder="用户名／手机号">
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="password" class="head-tls-inp fl" id="in-pass" placeholder="请输入密码">
                </div>
                <div class="head-tls-choose clearfix">
                    <a href="http://passport.fh21.com.cn/public/retrievepassword" class="fl a-hover">忘记密码?</a>
                    <a href="http://passport.fh21.com.cn/user/reg" class="fr a-hover">注册</a>
                </div>
                <button class="head-tls-sub" type="button" id="btn-login">登录</button>
                <div class="head-tls-others clearfix">
                    <a href="http://passport.fh21.com.cn/connect/tencent" class="fl clearfix head-tls-others-list">
                        <i class="icon icon-login-qq fl"></i>
                        <span class="fl">QQ登录</span>
                    </a>
                    <a href="http://passport.fh21.com.cn/connect/sina" class="fl clearfix head-tls-others-list">
                        <i class="icon icon-login-wb fl"></i>
                        <span class="fl">新浪微博登录</span>
                    </a>
                </div>
                
                
                
            </div>
            
        </div>
        
        
    </div>
<script type="text/html" id="tpl-login-status">

    <%if !userInfo%>
        <!--未登录-->
        <div class="head-tologin">
            <div class="head-tologin-head clearfix">
                <i class="icon icon-login-user fl"></i>
                <span class="fl head-tologin-word">登录</span>
            </div>
            <div class="head-tologin-show">
                <div class="head-tls-tips">
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="text"  class="head-tls-inp fl" id="in-user" placeholder="用户名／手机号" />
                </div>
                <div class="head-tls-inpwrap clearfix">
                    <input type="password"  class="head-tls-inp fl" id="in-pass" placeholder="请输入密码"/>
                </div>
                <div class="head-tls-choose clearfix">
                    <a href="http://passport.fh21.com.cn/public/retrievepassword" class="fl a-hover">忘记密码?</a>
                    <a href="http://passport.fh21.com.cn/user/reg" class="fr a-hover">注册</a>
                </div>
                <button class="head-tls-sub" type="button" id="btn-login">登录</button>
                <div class="head-tls-others clearfix">
                    <a href="http://passport.fh21.com.cn/connect/tencent" class="fl clearfix head-tls-others-list">
                        <i class="icon icon-login-qq fl"></i>
                        <span class="fl">QQ登录</span>
                    </a>
                    <a href="http://passport.fh21.com.cn/connect/sina" class="fl clearfix head-tls-others-list">
                        <i class="icon icon-login-wb fl"></i>
                        <span class="fl">新浪微博登录</span>
                    </a>
                </div>
                
                
                
            </div>
            
        </div>
        
        
    <%else%>            
        <!--已登录-->
        <div class="head-logined">
            <div class="head-logined-head clearfix">
                <a href="http://passport.fh21.com.cn" class="fl head-logined-head-left">
                    <img src="<% userInfo.avatar %>" class="all-img"/>
                </a>
                <i class="icon icon-login-arrow fl"></i>
            </div>
            <div class="head-logined-show">
                <div class="head-les-head">
                    <a href="http://passport.fh21.com.cn" class="head-les-head-img">
                        <img src="<% userInfo.avatar %>" class="all-img"/>
                    </a>
                    <h4 class="head-les-head-name">
                        <a href="http://passport.fh21.com.cn"><% userInfo.backend_nickname %></a>
                    </h4>
                    <h5  class="head-les-head-grade">
                        <%if userInfo.usertype == 0%>
                        普通会员
                        <% else %>
                        医生账户
                        <% /if %>
                    </h5>
                </div>
                <%if userInfo.usertype == 0%>
                <a href="http://passport.fh21.com.cn/personal/myquestionlist" class="clearfix head-les-list">
                    <i class="icon icon-login-mypro fl"></i>
                    <span class="fl head-les-list-tosolve">我的提问</span>
                </a>
                <% else %>
                <a href="http://passport.fh21.com.cn/personal/askme" class="clearfix head-les-list">
                    <i class="icon icon-login-topro fl"></i>
                    <span class="fl head-les-list-tosolve">对我的提问</span>
                </a>
                <a href="http://passport.fh21.com.cn/personal/doctorquestion" class="clearfix head-les-list">
                    <i class="icon icon-login-tosolve fl"></i>
                    <span class="fl head-les-list-tosolve">待解决问题</span>
                </a>
                <% /if %>
                
                
                
                <a href="http://passport.fh21.com.cn/personal/mymessagelist?type=1" class="clearfix head-les-list">
                    <i class="icon icon-login-mymsg fl"></i>
                    <span class="fl head-les-list-tosolve">我的消息(<em href="" class="a-hover"><% userInfo.message.allmessage %></em>)
                    </span>
                </a>
                <a href="http://passport.fh21.com.cn/user/logout?returnurl=//psy.fh21.com.cn/" class="head-les-exit">退出登录</a>
            </div>
        </div>
    <%/if%> 
        
        



</script>       

    </div>
</div>
<div class="header-b-box">
    
</div>

<!--/.头部-->