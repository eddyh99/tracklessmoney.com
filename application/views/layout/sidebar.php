        <!-- Sidebar  -->
        <nav id="sidebar">
            <!-- menu admin -->
            <ul class="list-unstyled components">
            <?php if ($_SESSION["logged_status"]["role"]=="member"){?>
                <li class="nav-item">
                    <a href="<?=base_url()?>member/dashboard" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <?php if (!$is_home){?>
                    <li>
                        <a href="<?=base_url()?>member/dashboard/wallet/<?=$_SESSION["currency"]?>" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">My Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>member/addfund" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Add/Recieve Funds</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>member/towallet" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Wallet to Wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>member/tobank" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Wallet to Bank</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>member/swap" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Swap</span>
                        </a>
                    </li>
                <?php }
                } elseif ($_SESSION["logged_status"]["role"]=="admin"){ ?>
                    <li class="active">
                        <a href="<?=base_url()?>admin/dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <?php if (!$is_home){?>
                        <li class="">
                            <a href="<?=base_url()?>admin/masterwallet/wallet/<?=$_SESSION["currency"]?>">
                                <i class="fas fa-wallet"></i>
                                Master Wallet                   
                            </a>
                        </li>
                        <li class="">
                            <a href="<?=base_url()?>admin/member">
                                <i class="fas fa-users"></i>
                                Members                    
                            </a>
                        </li>
                        <li class="">
                            <a href="#operation" class="nav-link align-middle dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#operation" aria-expanded="false">
                                <i class="fas fa-users-cog"></i>
                                Operations                    
                            </a>
                            <ul class="collapse list-unstyled" id="operation">
                                <li class="">
                                    <a href="<?=base_url()?>admin/operation/topup">
                                        Process Topup                            
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?=base_url()?>admin/operation/tocard">
                                        Process Card
                                    </a>
                                </li>
                            </ul>
                        </li>                
                        <li class="">
                            <a href="#transaction" class="nav-link align-middle dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#transaction" aria-expanded="false">
                                <i class="fas fa-list-ul"></i>
                                    Transactions                    
                            </a>
                            <ul class="collapse list-unstyled " id="transaction">
                                <li class="">
                                    <a href="<?=base_url()?>admin/wallet/addfund">
                                        Add / Receive Funds
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?=base_url()?>admin/wallet/transfer">
                                        Wallet to Wallet
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?=base_url()?>admin/wallet/tobank">
                                        Wallet to Bank
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?=base_url()?>admin/wallet/tocard">
                                        Wallet to Card
                                    </a>
                                </li>
                            </ul>
                        </li>                
                        <li class="">
                            <a href="<?=base_url()?>admin/mifcost">
                                <i class="fas fa-coins"></i>
                                    Default Cost
                            </a>
                        </li>
                        <li class="">
                            <a href="<?=base_url()?>admin/mifee">
                                <i class="fas fa-money-bill-wave"></i>
                                    Default Fee
                                </a>
                        </li>
                        <li class="">
                            <a href="<?=base_url()?>admin/currency">
                                <i class="fas fa-money-bill-wave"></i>
                                    Currency
                                </a>
                        </li>
                        <li class="">
                            <a href="<?=base_url()?>admin/mifbank">
                                <i class="fas fa-university"></i>
                                    MIF's Bank
                            </a>
                        </li>
                <?php }
                } 
                ?>
                <li>
                    <a href="<?=base_url()?>auth/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="col py-3 ms-2 container-fluid">